<?php

namespace App\Libraries;

use Mpdf\Mpdf;

class MpdfLibrary
{
    public function load()
    {
        return new Mpdf();
    }
}
