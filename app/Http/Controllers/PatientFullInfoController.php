<?php

namespace App\Http\Controllers;

use App\Models\patientrecord;
use Illuminate\Http\Request;
use App\Models\ConsultationListModel;
use Illuminate\Support\Facades\Crypt;

class PatientFullInfoController extends Controller
{
    public function ViewFullInfo(){
        $Info = Crypt::decrypt(session('EncryptedpatientsBasicInfo'));
        $patientsBasicInfo = patientrecord::where('PatientID', $Info)->first();
        $getAllConsultation = ConsultationListModel::all(); 
        return view('AdminPages.PatientFullInformation',compact('patientsBasicInfo','getAllConsultation'));
    }
}
