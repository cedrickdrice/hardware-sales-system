<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use View;
use App\Model\Helper;

class MediaLibraryController extends Controller
{
    public function getIndex()
    {
        return view('back-end.medialibrary.index');
    }
    public function postInsert(Request $request)
    {
        $removed_indexes = explode(',', $request->removed_indexes);
        $path = 'public/products/';

        Helper::uploadFiles($request, 'images', $path, $removed_indexes);

        $content = View::make('back-end.medialibrary.includes.index-inner')->render();
        return response()->json([
            'content'    => $content
        ]);
    }
}
