<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageUpload {
    protected function uploadImage($image)
    {
        $imageName = time().'.'.$image->extension();
//         $image->move(public_path('images'), $imageName);
        $image->move(storage_path('app/public/images'), $imageName);
        return $imageName;
    }

    protected function deleteImage($image)
    {
//         if(! preg_match('/http.*/', $image) && file_exists($image))
//         {
//             unlink($image);   
//         }
        if(!$image) return;
        
        if(! preg_match('/http.*/', $image) && Storage::exists('public/images/'.$image))
        {
            Storage::delete('public/images/'.$image); 
        }
    }
}
