<?php

namespace App\Http\Helpers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadImage
{
    public static function create($file, $foldername = '')
    {
        $filename = time() . '-' . time() . '.' . $file->getClientOriginalName();
        $path = public_path('assets/' . $foldername . '/' . $filename);

        Image::make($file->getRealPath())->resize(538, 200)->save($path, 100);
        return  $filename;
    }
    public static function update($file, $oldname, $foldername,$deleteOldImage=false)
    {
        if ($oldname && $oldname != 'default.png' and $deleteOldImage) {
            if (File::exists('assets/' . $foldername . '/' . $oldname)) {
                unlink('assets/' . $foldername . '/' . $oldname);
            }
        }

        $filename = time() . '-' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path('assets/' . $foldername . '/' . $filename);
        Image::make($file->getRealPath())->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path, 100);

        return $filename;
    }

    public static function delete($image, $folder)
    {
        if ($image) {

            if (File::exists('assets/' . $folder . '/' . $image)) {

                unlink('assets/' . $folder . '/' . $image);
            }
        }
    }


    public static function uploadPdf($file, $folder)
    {

        $path = $file->store($folder, [
            'disk' => 'uploads'
        ]);
        return $path;
    }


    public static function updateGeneral($file, $fileold, $folder)
    {
        self::deletePdf($fileold);

        $path = self::uploadPdf($file, $folder);
        return $path;
    }
    public static function deletePdf($image)
    {

        $x =  Storage::disk('uploads')->delete($image);
    }
}
