<?php

namespace App\Http\Controllers;

use App\Models\patientrecord;
use Illuminate\Http\Request;
use App\Models\ConsultationListModel;
use Illuminate\Support\Facades\Crypt;

class PatientFullInfoController extends Controller
{
    public function ViewFullInfo($Stamp_Token){
        $Stamp_Token = Crypt::decrypt(urldecode($Stamp_Token));
        $patientsBasicInfo = patientrecord::where('Stamp_Token', $Stamp_Token)->first();
        $getAllConsultation = ConsultationListModel::all(); 
        return view('AdminPages.PatientFullInformation',compact('patientsBasicInfo','getAllConsultation'));
    }
}
