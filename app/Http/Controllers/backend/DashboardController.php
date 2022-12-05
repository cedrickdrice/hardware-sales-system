<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Order;
use App\Model\Order_Detail;
use App\User;
use Carbon\Carbon;
use View, Crypt, Auth;

class DashboardController extends Controller
{
    public function getIndex()
    {
        $this->data['best_seller'] = Order_Detail::selectRaw('product_id,count(product_id) as best_seller')->groupBy('product_id')->orderBy('best_seller', 'desc')->first();
        $this->data['best_sellers'] = Order_Detail::selectRaw('product_id,count(product_id) as best_seller')->groupBy('product_id')->orderBy('best_seller', 'desc')->get(10);
        $this->data['critical_product'] = Product::selectRaw('*,(stock/(stock + used_stock)) as critical_level')->orderBy('critical_level', 'asc')->first();
        $this->data['recently_addeds'] = Product::orderBy('created_at','desc')->limit(4)->get();
        $this->data['latest_orders'] = Order::orderBy('created_at', 'desc')->limit(6)->get();
        $this->data['total_products'] = count(Product::all());
        $this->data['total_customer'] = User::where('type', 'user')->count();
        $this->data['total_order'] = count(Order::all());
        $this->data['delivery_charge'] =
        $this->data['today_sales'] = 0;
        $orders_today = Order::whereDate('created_at', Carbon::today()->format('Y-m-d'))->get();
        foreach ($orders_today as $today) {
            $this->data['today_sales'] += Crypt::decrypt($today->amount);
        }
        $sales = 0;
        $orders_total = Order::all();
        foreach ($orders_total as $order) {
            $sales += $order->totalAmount();
        }
        $inventory = 0;
        $product_total = Product::all();
        foreach($product_total as $product) {
            $stock = $product->stock;
            $used = $product->used_stock;
            $total_stock = $used + $stock;
            $price = $product->delivery_price;
            $inventory += $total_stock * $price;
        }

        $this->data['monthly_sales'] = Order::where('status', '=', '2')->get()->groupBy(function($d) {
            return Carbon::parse($d->created_at)->format('M');
        });
        $this->data['monthly_products'] = $monthly_products = Product::get()->groupBy(function($d) {
            return Carbon::parse($d->updated_at)->format('M');
        });

        $forecast = $this->generateSalesGraph();
        $this->data['monthly_forecast'] = $forecast;
        $this->data['total_sales'] = collect($forecast)->sum('actual_sales');

        return view('back-end.dashboard.manager.index', $this->data);
    }

    private function generateSalesGraph()
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

                    } else {  // PAG WALANG BUMILI LAST MONTH
                        $forecast[$iMonth][$iCurrentProductId]['product_name'] = ($aProductOrders[$iCurrentProductId])->product->name;
                        $forecast[$iMonth][$iCurrentProductId]['current_demand'] = 0;
                        $forecast[$iMonth][$iCurrentProductId]['current_prediction'] = ((1 - $iAlpha) * 0) + ($iAlpha * 0);
                    }
                }
                $forecast[$iMonth][$iCurrentProductId]['product_price'] = (double)$aCurrentProduct->price;
            }
        }

        // LAST 3 MONTHS
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
                $forecast[($iMonthKey + 1) . '-' . $iYearKey] = array(
                    'value' => ($iMonthKey + 1) . '-' . $iYearKey,
                    'month' => date("M",strtotime($iYearKey. '-' .($iMonthKey + 1) . '-01')) . '-' . $iYearKey,
                    'actual_sales' => 0,
                    'predicted_sales' => $iCurrentPredictedSales,
                );
                $forecast[($iMonthKey + 2) . '-' . $iYearKey] = array(
                    'value' => ($iMonthKey + 1) . '-' . $iYearKey,
                    'month' => date("M",strtotime($iYearKey. '-' .($iMonthKey + 2) . '-01')) . '-' . $iYearKey,
                    'actual_sales' => 0,
                    'predicted_sales' => $iCurrentPredictedSales,
                );
                $forecast[('01') . '-' . ($iYearKey + 1)] = array(
                    'value' => ('01') . '-' . ($iYearKey + 1),
                    'month' => date("M", strtotime($iYearKey. '-' .'01-01')) . '-' . ($iYearKey + 1),
                    'actual_sales' => 0,
                    'predicted_sales' => $iCurrentPredictedSales,
                );
                continue;
            }
            if ($iMonthKey === 11 && isset($forecast[($iMonthKey + 1) . '-' . $iYearKey]) === false) {
                $forecast[($iMonthKey + 1) . '-' . $iYearKey] = array(
                    'value' => ($iMonthKey + 1) . '-' . $iYearKey,
                    'month' => date("M",strtotime($iYearKey. '-' .($iMonthKey + 1) . '-01')) . '-' . $iYearKey,
                    'actual_sales' => 0,
                    'predicted_sales' => $iCurrentPredictedSales,
                );
                $forecast[('01') . '-' . ($iYearKey + 1)] = array(
                    'value' => ('01') . '-' . ($iYearKey + 1),
                    'month' => date("M", strtotime($iYearKey. '-' .'01-01')) . '-' . ($iYearKey + 1),
                    'actual_sales' => 0,
                    'predicted_sales' => $iCurrentPredictedSales,
                );
                $forecast[('02') . '-' . ($iYearKey + 1)] = array(
                    'value' => ('02') . '-' . ($iYearKey + 1),
                    'month' => date("M", strtotime($iYearKey. '-' .'02-01')) . '-' . ($iYearKey + 1),
                    'actual_sales' => 0,
                    'predicted_sales' => $iCurrentPredictedSales,
                );
                continue;
            }
            if ($iMonthKey === 12 && isset($forecast[('01') . '-' . ($iYearKey + 1)]) === false) {
                $forecast[('01') . '-' . ($iYearKey + 1)] = array(
                    'value' => ('01') . '-' . ($iYearKey + 1),
                    'month' => date("M", strtotime($iYearKey. '-' .'01-01')) . '-' . ($iYearKey + 1),
                    'actual_sales' => 0,
                    'predicted_sales' => $iCurrentPredictedSales,
                );
                $forecast[('02') . '-' . ($iYearKey + 1)] = array(
                    'value' => ('02') . '-' . ($iYearKey + 1),
                    'month' => date("M", strtotime($iYearKey. '-' .'02-01')) . '-' . ($iYearKey + 1),
                    'actual_sales' => 0,
                    'predicted_sales' => $iCurrentPredictedSales,
                );
                $forecast[('03') . '-' . ($iYearKey + 1)] = array(
                    'value' => ('03') . '-' . ($iYearKey + 1),
                    'month' => date("M", strtotime($iYearKey. '-' .'03-01')) . '-' . ($iYearKey + 1),
                    'actual_sales' => 0,
                    'predicted_sales' => $iCurrentPredictedSales,
                );
                continue;
            }
            $forecast[($iMonthKey + 1) . '-' . $iYearKey] = array(
                'value' => ($iMonthKey + 1) . '-' . $iYearKey,
                'month' => date("M",strtotime($iYearKey. '-' .($iMonthKey + 1) . '-01')) . '-' . $iYearKey,
                'actual_sales' => 0,
                'predicted_sales' => $iCurrentPredictedSales,
            );
            $forecast[($iMonthKey + 2) . '-' . $iYearKey] = array(
                'value' => ($iMonthKey + 2) . '-' . $iYearKey,
                'month' => date("M",strtotime($iYearKey. '-' .($iMonthKey + 1) . '-01')) . '-' . $iYearKey,
                'actual_sales' => 0,
                'predicted_sales' => $iCurrentPredictedSales,
            );
            $forecast[($iMonthKey + 3) . '-' . $iYearKey] = array(
                'value' => ($iMonthKey + 3) . '-' . $iYearKey,
                'month' => date("M",strtotime($iYearKey. '-' .($iMonthKey + 1) . '-01')) . '-' . $iYearKey,
                'actual_sales' => 0,
                'predicted_sales' => $iCurrentPredictedSales,
            );
        }
        return $forecast;
    }
}
