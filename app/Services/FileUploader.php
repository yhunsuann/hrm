<?php 
namespace App\Services;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class FileUploader
{    
    /**
     * uploadFileRecruitment
     *
     * @param  mixed $request
     * @return void
     */
    public function uploadFile(Request $request, $path)
    {
        if ($request->hasFile('upload_image')) {
            $ext = $request->file('upload_image')->extension();
            $file_name = time(). '-' . 'img.' .$ext;
            $file = $request->file('upload_image');

            $image = Image::make($file);
            $image->fit(535, 480);
            $image->save(storage_path("app/public/assets/img/$path") . '/' . $file_name);

            return $file_name;
        }
    
        return null;
    }

}
