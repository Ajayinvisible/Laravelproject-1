<?php

namespace App\Helper;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

trait General
{

    public function singleFileUpload($directionPath = '')
    {
        if (!empty(Request::file())) {
            $directionPath = trim($directionPath, '/');
            $files = Request::file();
            $file = Arr::first($files);
            $ext = $file->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . Str::lower($ext);
            $directionPath = trim($directionPath, '/');
            $uploadPath = public_path($directionPath);
            if (!File::exists($uploadPath)) {
                File::makeDirectory($directionPath, 0755, true);
            }

            if (!$file->move($uploadPath, $imageName)) {
                return Redirect::back()->with('error', 'file upload errors');
            }
            return $directionPath . '/' . $imageName;
        }

        return false;
    }

    public function deleteFile($filePath)
    {
        $getFilePath = public_path($filePath);
        if (file_exists($getFilePath) && is_file($getFilePath)) {
            unlink($filePath);
            return true;
        }
        return true;
    }
}