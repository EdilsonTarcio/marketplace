<?php

namespace App\Traits;

use Illuminate\Http\Request;

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
}
