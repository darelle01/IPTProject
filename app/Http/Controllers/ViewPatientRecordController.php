<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patientrecord;
use App\Models\ConsultationListModel;
use Illuminate\Support\Facades\Crypt;

class ViewPatientRecordController extends Controller
{
    public function ViewMore(Request $request){
        $request->validate([
            'View' => 'required|string',
        ]);
        $View = $request->input('View');
        $PatientInfo = patientrecord::where('Stamp_Token' , $View)->first();
        $EncryptedStampToken = Crypt::encrypt($View);
        $EncryptedpatientsBasicInfo = Crypt::encrypt($PatientInfo->PatientID);
        session(['EncryptedpatientsBasicInfo' => $EncryptedpatientsBasicInfo]);
        $url = route('Admin.patientFullView', ['Stamp_Token' => urlencode($EncryptedStampToken)]);
        return redirect($url);
    }
}
