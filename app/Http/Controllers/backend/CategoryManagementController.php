<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use View,Auth,Crypt;

class CategoryManagementController extends Controller
{
    public function getIndex(){
        $this->data['categories'] = Category::where('type', 'product')->get();
        $this->data['colors'] = Category::where('type', 'color')->get();
        return view('back-end.categories.index', $this->data);
    }

    public function getEdit($id)
    {
        $this->data['category'] = Category::find($id);
        return response()->json([
            'category'   => $this->data['category']
        ]);
    }

    public function postInsert(Request $request) {
        $check = Category::manageData($request);
        if ($check) {
            if ($request->label === 'color') {
                $this->data['colors'] = Category::where('type', 'color')->get();
                $content = View::make('back-end.categories.includes.index-color', $this->data)->render();
            } else {
                $this->data['categories'] = Category::where('type', 'product')->get();
                $content = View::make('back-end.categories.includes.index-category', $this->data)->render();
            }
            return response()->json([
                'content'   => $content,
                'label'     => 'Successfully Added!',
                'text'      => 'success'
            ]);
        } else {
            return response()->json([
                'text'      => 'error',
                'label'     => 'data is duplicated'
            ]);
        }
    }

    public function postUpdate(Request $request)
    {
        Category::updateCategory($request);
        $this->data['categories'] = Category::where('type', 'product')->get();
        $content = View::make('back-end.categories.includes.index-category', $this->data)->render();
        return response()->json([
            'content'   => $content,
            'label'     => 'Successfully Updated!',
            'text'      => 'success'
        ]);
    }
}
