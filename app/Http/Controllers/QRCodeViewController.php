<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patientrecord;
use Illuminate\Support\Facades\Crypt;

class QRCodeViewController extends Controller
{
    public function QRCodePage(){
        $PatientQRCode = session('PatientQRCode');
        $Stamp_Token = Crypt::decrypt(session('EncryptedStamp_Token'));
        $PatientInfo = patientrecord::where('Stamp_Token', $Stamp_Token)->first(); 
        return view('AdminPages.QRCode', compact('PatientQRCode','PatientInfo'));
    }
}
