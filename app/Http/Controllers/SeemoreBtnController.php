<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patientrecord;
use App\Models\ConsultationListModel;
use Illuminate\Support\Facades\Crypt;

class SeemoreBtnController extends Controller
{
     public function SeemoreBtn(Request $request){
        $request->validate([
            'Seemore' => 'required|string|max:255',
        ]);

        $Seemore = $request->input('Seemore');   
        $PatientInfo = patientrecord::where('Stamp_Token' , $Seemore)->first();
        $EncryptedStampToken = Crypt::encrypt($Seemore);
        $EncryptedpatientsBasicInfo = Crypt::encrypt($PatientInfo->PatientID);
        session(['EncryptedpatientsBasicInfo' => $EncryptedpatientsBasicInfo]);
        $url = route('Admin.patientFullView', ['Stamp_Token' => urlencode($EncryptedStampToken)]);
        return redirect($url);
    }
}
