<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Gallery;
use App\Model\Helper;

class GalleryAPIController extends Controller
{

    public function getIndex($id)
    {
        $galleries = Gallery::where('user_id', $id)->orderBy('id', 'DESC')->get();
        return response()->json($galleries);
    }

    public function getDelete($id)
    {
        Gallery::find($id)->delete();
    }

    public function postUpload(Request $request, $user_id)
    {
        $gallery                        = new Gallery;
        $gallery->user_id               = $user_id;

        $path                           = 'public/gallery/';

        $gallery->image                 = Helper::uploadFile($request, 'file', $path);
        $gallery->save();

        return response()->json($gallery);
    }
}
