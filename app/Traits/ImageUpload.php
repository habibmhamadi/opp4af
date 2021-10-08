<?php

namespace App\Traits;

trait ImageUpload {
    protected function uploadImage($image)
    {
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);
        return $imageName;
    }

    protected function deleteImage($image)
    {
        if(! preg_match('/http.*/', $image) && file_exists($image))
        {
            unlink($image);   
        }
    }
}
