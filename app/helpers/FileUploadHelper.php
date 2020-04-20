<?php


namespace App\helpers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FileUploadHelper
{
    public static function upload($image, string $folder, bool $resize = false, int $width = 800, int $height = 800)
    {
        $imageName = Storage::putFile($folder, new File($image), 'public');
        return $imageName;
    }

    private static function resize($image, string $folder, int $width, int $height)
    {
        $img = Image::make($image);
        $fileName = uniqid("", true) . '.' . $image->getClientOriginalExtension();
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->stream();
        Storage::put($folder . '/' . $fileName, $img, 'public');
        return $folder . "/" . $fileName;
    }
}
