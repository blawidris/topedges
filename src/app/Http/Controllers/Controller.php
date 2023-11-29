<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function uploadImage($data)
    {

        if ($data->hasFile('image')) {

            //get file extension
            $file = $data->file('image');
            $fileExt = $file->getClientOriginalExtension();

            // create new name file
            $fileName = $this->generate_random_strings(5) . '_' .  time() .  '.' . $fileExt;
            // $filePath = $data->dir;

            if ($file->storeAs($data->dir, $fileName)) {
                return "{$data->dir}/$fileName";
            }
        }
    }

    public function generate_random_number($length)
    {
        $char  = '1234567890';
        $newString = '';

        for ($i = 0; $i <= $length; $i++) {
            $newString .= $char[rand(0, strlen($char) - 1)];
        }

        return $newString;
    }


    public function generate_random_strings($length)
    {
        $char  = 'abcdefghijklmnoqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $newString = '';

        for ($i = 0; $i <= $length; $i++) {
            $newString .= $char[rand(0, strlen($char) - 1)];
        }

        return $newString;
    }


}
