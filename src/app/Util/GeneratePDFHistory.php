<?php

namespace App\Util;

use App\Interfaces\GenerateHistory;

class GeneratePDFHistory implements GenerateHistory{
    public function generateHistory($request){
        $user = auth()->user();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>'.$user->getName().'</h1>');
        $mpdf->Output();
    }
}