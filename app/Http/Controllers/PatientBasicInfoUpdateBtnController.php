<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\patientrecord;
use App\Models\ConsultationListModel;
use Illuminate\Support\Facades\Crypt;

class PatientBasicInfoUpdateBtnController extends Controller
{
    public function UpdatePatientInfo(Request $request){
        $UpdatePatientInfo = $request->validate([
            'PatientID' => 'string|max:255',
            'LastName' => 'string|max:255',
            'FirstName' => 'string|max:255',
            'MiddleName' => 'string|max:255',
            'Birthdate' => 'date|before:today',
            'Age' => 'integer|min:0',
            'Gender' => 'string',
            'HouseNumber' => 'string|max:255',
            'Street' => 'string|max:255',
            'Barangay' => 'string|max:255',
            'Municipality' => 'string|max:255',
            'Province' => 'string|max:255',
            'ContactNumber' => 'string|size:13|regex:/^\+?[0-9]+$/',
            'email' => 'nullable|email',
            'PhilhealthNumber' => 'nullable|string',
        ]);
        // Remove +63 if present
        if (Str::startsWith($UpdatePatientInfo['ContactNumber'], '+63')) {
            $UpdatePatientInfo['ContactNumber'] = substr($UpdatePatientInfo['ContactNumber'], 3);
        }
        
        $PatientID = $UpdatePatientInfo['PatientID'];
        $PBasicInfoUpdate = patientrecord::where('PatientID', $PatientID)->first();
       
        if ($PBasicInfoUpdate) {
            $PBasicInfoUpdate->LastName = $UpdatePatientInfo['LastName'];
            $PBasicInfoUpdate->FirstName = $UpdatePatientInfo['FirstName'];
            $PBasicInfoUpdate->MiddleName = $UpdatePatientInfo['MiddleName'];

            $PBasicInfoUpdate->Birthdate = $UpdatePatientInfo['Birthdate'];
            $PBasicInfoUpdate->Age = $UpdatePatientInfo['Age'];
            $PBasicInfoUpdate->Gender = $UpdatePatientInfo['Gender'];

            $PBasicInfoUpdate->HouseNumber = $UpdatePatientInfo['HouseNumber'];
            $PBasicInfoUpdate->Street = $UpdatePatientInfo['Street'];
            $PBasicInfoUpdate->Barangay = $UpdatePatientInfo['Barangay'];
            $PBasicInfoUpdate->Municipality = $UpdatePatientInfo['Municipality'];
            $PBasicInfoUpdate->Province = $UpdatePatientInfo['Province'];

            $PBasicInfoUpdate->ContactNumber = $UpdatePatientInfo['ContactNumber'];
            $PBasicInfoUpdate->email = $UpdatePatientInfo['email'];
            $PBasicInfoUpdate->PhilhealthNumber = $UpdatePatientInfo['PhilhealthNumber'];

            $PBasicInfoUpdate->save();
            
            $UpdatedInfo = patientrecord::where('PatientID', $PBasicInfoUpdate['PatientID'])->first();
            $EncryptedStampToken = Crypt::encrypt($UpdatedInfo->Stamp_Token);
            $EncryptedpatientsBasicInfo = Crypt::encrypt($UpdatedInfo->PatientID);
            session(['EncryptedpatientsBasicInfo' => $EncryptedpatientsBasicInfo]);
            $url = route('Admin.patientFullView', ['Stamp_Token' => urlencode($EncryptedStampToken)]);
            return redirect($url);
        } 
        else{
            return redirect()->back();
        }
    }
}
