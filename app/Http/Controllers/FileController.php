<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;

class FileController
{


    public function getFile(?string $filePath)
    {
        if(!$filePath) {
            response()->setStatusCode(404);
        }
        return response()->file(storage_path('app/' . $filePath));
    }
}
