<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Zip;

class Helper extends Model
{
    public static function uploadFile($request, $inputName, $path)
    {
        //Get the file name with extension
        $fileNameWithExt = $request->file($inputName)->getClientOriginalName();
        //Get the file name
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //Get the extension name
        $extension = $request->file($inputName)->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        //Upload image
        $path = $request->file($inputName)->storeAs($path, $fileNameToStore);

        return $fileNameToStore;
    }
    public static function filtNotRequest($image,$inputName, $path)
    {
        //Get the file name with extension
        $fileNameWithExt = $image->getClientOriginalName();
        //Get the file name
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //Get the extension name
        $extension = $image->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        //Upload image
        $path = $image->storeAs($path, $fileNameToStore);

        return $fileNameToStore;
    }

    public static function uploadFiles($request, $inputName, $path, $excludedIndexes = [])
    {
        $filenames = [];
        $counter = 0;

        foreach ($request->$inputName as $file)
        {
            if (!in_array($counter, $excludedIndexes)) {
                //Get the file name with extension
                $fileNameWithExt = $file->getClientOriginalName();
                //Get the file name
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //Get the extension name
                $extension = $file->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                //Upload image
                $path = $file->storeAs($path, $fileNameToStore);

                $filenames[] = $fileNameToStore;
            }
            $counter++;

        }

        return $filenames;
    }

    public static function extractZip($file, $path, $zipPath ='')
    {
        $is_valid = Zip::check($file);
        if ($is_valid) {
            $zip = Zip::open($file);
            $zip->extract($path);

            $files =  $zip->listFiles();
            $zip->close();
            return $files;
        }

        return [];
    }
}
