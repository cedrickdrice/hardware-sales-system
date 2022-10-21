<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Category;

class CategoryAPIController extends Controller
{
    public function getCategories($type)
    {
        $categories = Category::where('type', $type)->get();
        return response()->json($categories);
    }
}
