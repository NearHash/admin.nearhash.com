<?php

namespace App\Http\Controllers\API\Helpers;
use Illuminate\Support\Str;

class General
{
    public function strGenerator($no)
    {
        return   Str::random($no); // how many str do u wanna
    }

    public function chrGenerator()
    {
        $UpperCase = chr(rand(65,90));
        $NewCase = chr(rand(65,90));
        $LowerCase = chr(rand(97,122));
        return 'NH'.$UpperCase.$NewCase;
    }
}
