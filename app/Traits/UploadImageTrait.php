<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait UploadImageTrait
{
    public function uploadImage(Request $request, $field, $path)
    {
        if ($request->hasFile($field)) {

            $image = $request->{$field};
            $ext = $image->getClientOriginalExtension();
            $day = date('d-m-Y');
            $imageName = 'media_' . uniqid() . '-talice-' . $day . '.' . $ext;
            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }
    }

    public function updateImage(Request $request, $field, $path, $oldPath = null)
    {
        if ($request->hasFile($field)) {

            if(File ::exists(public_path($oldPath))){
                File::delete(public_path($oldPath));
            }

            $image = $request->{$field};
            $ext = $image->getClientOriginalExtension();
            $day = date('d-m-Y');
            $imageName = 'media_' . uniqid() . '-talice-' . $day . '.' . $ext;
            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }
    }

    public function deleteImage(string $path)
    {

        if(File ::exists(public_path($path))){
            File::delete(public_path($path));
        }

    }
}
