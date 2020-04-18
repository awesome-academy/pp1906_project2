<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait UploadTrait
{
    public function upload(UploadedFile $uploadedFile, $folder, $disk)
    {
        $file = $uploadedFile->storeAs($folder, $uploadedFile->getClientOriginalName(), $disk);

        return $file;
    }
}
