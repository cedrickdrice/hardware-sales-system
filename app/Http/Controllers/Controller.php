<?php

namespace App\Http\Controllers;

use App\Model\Configuration;
use App\Model\Order_Detail;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->data['configuration'] = Configuration::find(1);
        View::share($this->data);
    }

    /**
     * @link https://towardsdatascience.com/diy-simple-exponential-smoothing-with-excel-df4b8728e19e
     * @return array
     */
    public function generateSalesGraph(): array
    {
        $iAlpha = 0.10;
        $forecast = array();

        $allOrderedProduct = Order_Detail::whereHas('order', function($q){
            $q->where('status', '=', '2');
        })->get()->groupBy(function($d) {
            return $d->product_id;
        });

        $this->data['monthly_per_sales'] = Order_Detail::whereHas('order', function($q){
            $q->where('status', '=', '2');
        })->get()->groupBy(function($d) {
            return Carbon::parse($d->created_at)->format('m-Y');
        });

        foreach($this->data['monthly_per_sales'] as $iMonth => &$month) {
            $iMonthKey = (int)substr($iMonth, 0, 2);
            $iYearKey = (int)substr($iMonth, 3, 4);
            $forecast[$iMonth] = array(); // Month: Nov
            $forecast[$iMonth]['value'] = $iMonth; // Month: Nov
            $aOrderedProducts = (empty($month) === false) ? $month->groupBy(function($d) {
                return $d->product_id;
            }) : [];
            foreach ($allOrderedProduct as &$aProductOrders) { //loop through all the product sold all time
                $iCurrentProductId = $aProductOrders[0]['product_id'];
                $aCurrentProduct = ($aProductOrders[0])->product;
                $forecast[$iMonth]['month'] = date("M", strtotime($iYearKey. '-' .$iMonthKey . '-01')) . '-' . $iYearKey;
                $iPrevMonth = ($iMonthKey === 1) ? 12 : $iMonthKey - 1;
                $iPrevYear = ($iMonthKey === 1) ? ($iYearKey - 1) : $iYearKey;
                if (isset($forecast[$iMonth]['actual_sales']) === false) {
                    $forecast[$iMonth]['actual_sales'] = 0;
                    $forecast[$iMonth]['predicted_sales'] = 0;
                }
                if (isset($aOrderedProducts[$iCurrentProductId]) === true) { // PAG MAY BUMILI NGAYONG MONTH
                    $forecast[$iMonth][$iCurrentProductId]['product_name'] = $aCurrentProduct->name;
                    $forecast[$iMonth][$iCurrentProductId]['current_demand'] = 1;
                    $forecast[$iMonth][$iCurrentProductId]['current_prediction'] = 1;
                    if ($iMonthKey > 1 && isset($this->data['monthly_per_sales'][($iPrevMonth) . '-' . $iPrevYear]) === true) { //PAGKA HINDI INITIAL NA START NG SALES
                        $iPreviousDemand = $forecast[$iPrevMonth . '-' . $iPrevYear][$iCurrentProductId]['current_demand'];
                        $iPreviousPrediction = $forecast[$iPrevMonth . '-' . $iPrevYear][$iCurrentProductId]['current_prediction'];
                        $forecast[$iMonth][$iCurrentProductId]['product_name'] = $aCurrentProduct->name;
                        $forecast[$iMonth][$iCurrentProductId]['current_demand'] = ($aOrderedProducts[$iCurrentProductId])->sum('quantity');
                        $forecast[$iMonth][$iCurrentProductId]['current_prediction'] = ((1 - $iAlpha) * $iPreviousPrediction) + ($iAlpha * $iPreviousDemand);

                    } else { // PAGKA FIRST TIME ANG SALES
                        $forecast[$iMonth][$iCurrentProductId]['product_name'] = $aCurrentProduct->name;
                        $forecast[$iMonth][$iCurrentProductId]['current_demand'] = ($aOrderedProducts[$iCurrentProductId])->sum('quantity');
                        $forecast[$iMonth][$iCurrentProductId]['current_prediction'] = ($aOrderedProducts[$iCurrentProductId])->sum('quantity');
                    }
                    $forecast[$iMonth]['actual_sales'] += $forecast[$iMonth][$iCurrentProductId]['current_demand'] * $aCurrentProduct->price;
                    $forecast[$iMonth]['predicted_sales'] += $forecast[$iMonth][$iCurrentProductId]['current_prediction'] * $aCurrentProduct->price;
                    $forecast[$iMonth]['is_forecast'] = false;
                }
                if (isset($aOrderedProducts[$iCurrentProductId]) === false) { // PAG WALANG BUMILI NGAYONG MONTH
                    if (isset($forecast[$iPrevMonth . '-' . $iPrevYear][$iCurrentProductId]) === true) { // PAG MAY BUMILI LAST MONTH
                        $iPreviousDemand = $forecast[$iPrevMonth . '-' . $iPrevYear][$iCurrentProductId]['current_demand'];
                        $iPreviousPrediction = $forecast[$iPrevMonth . '-' . $iPrevYear][$iCurrentProductId]['current_prediction'];
                        $forecast[$iMonth][$iCurrentProductId]['product_name'] = $aCurrentProduct->name;
                        $forecast[$iMonth][$iCurrentProductId]['current_demand'] = 0;
                        $forecast[$iMonth][$iCurrentProductId]['current_prediction'] = ((1 - $iAlpha) * $iPreviousPrediction) + ($iAlpha * $iPreviousDemand);

                        $forecast[$iMonth]['actual_sales'] += $forecast[$iMonth][$iCurrentProductId]['current_demand'] * $aCurrentProduct->price;
                        $forecast[$iMonth]['predicted_sales'] += $forecast[$iMonth][$iCurrentProductId]['current_prediction'] * $aCurrentProduct->price;
                        $forecast[$iMonth]['is_forecast'] = false;

                    } else {  // PAG WALANG BUMILI LAST MONTH
                        $forecast[$iMonth][$iCurrentProductId]['product_name'] = ($aProductOrders[$iCurrentProductId])->product->name;
                        $forecast[$iMonth][$iCurrentProductId]['current_demand'] = 0;
                        $forecast[$iMonth][$iCurrentProductId]['current_prediction'] = ((1 - $iAlpha) * 0) + ($iAlpha * 0);
                    }
                }
                $forecast[$iMonth][$iCurrentProductId]['product_price'] = (double)$aCurrentProduct->price;
            }
        }

        // LAST 3 MONTHS, PREDICT SALES
        $aLastStat = [end($forecast)['value'] => end($forecast)];
        foreach($aLastStat as $iMonth => &$month) {
            $iMonthKey = (int)substr($iMonth, 0, 2);
            $iMonthKey = ($iMonthKey < 10) ? '0'.$iMonthKey : $iMonthKey;
            $iYearKey = (int)substr($iMonth, 3, 4);
            $iCurrentPredictedSales = 0;

            foreach ($month as $mKey => $aProduct) {
                if (is_array($aProduct) === false) {
                    continue;
                }
                $iProductNo = $mKey;
                $iPreviousDemand = $forecast[$iMonthKey . '-' . $iYearKey][$iProductNo]['current_demand'];
                $iPreviousPrediction = $forecast[$iMonthKey . '-' . $iYearKey][$iProductNo]['current_prediction'];
                $iCurrentPrediction = ((1 - $iAlpha) * $iPreviousPrediction) + ($iAlpha * $iPreviousDemand);
                $iCurrentPredictedSales += $iCurrentPrediction * $aProduct['product_price'];
            }

            if ($iMonthKey === 10 && isset($this->data['monthly_per_sales'][($iMonthKey + 1) . '-' . $iYearKey]) === false) {
                $forecast = $this->getInitialMonthForecast($iMonthKey, $iYearKey, $iCurrentPredictedSales, $forecast);
                $forecast[($iMonthKey + 2) . '-' . $iYearKey] = array(
                    'value' => ($iMonthKey + 1) . '-' . $iYearKey,
                    'month' => date("M",strtotime($iYearKey. '-' .($iMonthKey + 2) . '-01')) . '-' . $iYearKey,
                    'actual_sales' => 0,
                    'predicted_sales' => $iCurrentPredictedSales,
                    'is_forecast' => true
                );
                $forecast = $this->getJanForecast($iYearKey, $iCurrentPredictedSales, $forecast);
                continue;
            }

            if ($iMonthKey === 11 && isset($forecast[($iMonthKey + 1) . '-' . $iYearKey]) === false) {
                $forecast = $this->getInitialMonthForecast($iMonthKey, $iYearKey, $iCurrentPredictedSales, $forecast);
                $forecast = $this->getJanFebMonthForecast($iYearKey, $iCurrentPredictedSales, $forecast);
                continue;
            }

            if ($iMonthKey === 12 && isset($forecast[('01') . '-' . ($iYearKey + 1)]) === false) {
                $forecast = $this->getJanFebMonthForecast($iYearKey, $iCurrentPredictedSales, $forecast);
                $forecast[('03') . '-' . ($iYearKey + 1)] = array(
                    'value' => ('03') . '-' . ($iYearKey + 1),
                    'month' => date("M", strtotime($iYearKey. '-' .'03-01')) . '-' . ($iYearKey + 1),
                    'actual_sales' => 0,
                    'predicted_sales' => $iCurrentPredictedSales,
                    'is_forecast' => true
                );
                continue;
            }

            $forecast = $this->getInitialMonthForecast($iMonthKey, $iYearKey, $iCurrentPredictedSales, $forecast);
            $forecast[($iMonthKey + 2) . '-' . $iYearKey] = array(
                'value' => ($iMonthKey + 2) . '-' . $iYearKey,
                'month' => date("M",strtotime($iYearKey. '-' .($iMonthKey + 2) . '-01')) . '-' . $iYearKey,
                'actual_sales' => 0,
                'predicted_sales' => $iCurrentPredictedSales,
                'is_forecast' => true
            );
            $forecast[($iMonthKey + 3) . '-' . $iYearKey] = array(
                'value' => ($iMonthKey + 3) . '-' . $iYearKey,
                'month' => date("M",strtotime($iYearKey. '-' .($iMonthKey + 3) . '-01')) . '-' . $iYearKey,
                'actual_sales' => 0,
                'predicted_sales' => $iCurrentPredictedSales,
                'is_forecast' => true
            );
        }
        return $forecast;
    }

    /**
     * @param int $iMonthKey
     * @param int $iYearKey
     * @param $iCurrentPredictedSales
     * @param array $forecast
     * @return array
     */
    private function getInitialMonthForecast(int $iMonthKey, int $iYearKey, $iCurrentPredictedSales, array $forecast): array
    {
        $forecast[($iMonthKey + 1) . '-' . $iYearKey] = array(
            'value' => ($iMonthKey + 1) . '-' . $iYearKey,
            'month' => date("M", strtotime($iYearKey . '-' . ($iMonthKey + 1) . '-01')) . '-' . $iYearKey,
            'actual_sales' => 0,
            'predicted_sales' => $iCurrentPredictedSales,
            'is_forecast' => true
        );
        return $forecast;
    }

    /**
     * @param int $iYearKey
     * @param $iCurrentPredictedSales
     * @param array $forecast
     * @return array
     */
    private function getJanFebMonthForecast(int $iYearKey, $iCurrentPredictedSales, array $forecast): array
    {
        $forecast = $this->getJanForecast($iYearKey, $iCurrentPredictedSales, $forecast);
        $forecast[('02') . '-' . ($iYearKey + 1)] = array(
            'value' => ('02') . '-' . ($iYearKey + 1),
            'month' => date("M", strtotime($iYearKey . '-' . '02-01')) . '-' . ($iYearKey + 1),
            'actual_sales' => 0,
            'predicted_sales' => $iCurrentPredictedSales,
            'is_forecast' => true
        );
        return $forecast;
    }

    /**
     * @param int $iYearKey
     * @param $iCurrentPredictedSales
     * @param array $forecast
     * @return array
     */
    private function getJanForecast(int $iYearKey, $iCurrentPredictedSales, array $forecast): array
    {
        $forecast[('01') . '-' . ($iYearKey + 1)] = array(
            'value' => ('01') . '-' . ($iYearKey + 1),
            'month' => date("M", strtotime($iYearKey . '-' . '01-01')) . '-' . ($iYearKey + 1),
            'actual_sales' => 0,
            'predicted_sales' => $iCurrentPredictedSales,
            'is_forecast' => true
        );
        return $forecast;
    }
}
