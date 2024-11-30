<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeViewController extends Controller
{
    public function QRCodePage(){
        $PatientQRCode = session('PatientQRCode');
        return view('AdminPages.QRCode', compact('PatientQRCode'));
    }
}
