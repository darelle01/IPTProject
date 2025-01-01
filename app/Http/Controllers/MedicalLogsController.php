<?php

namespace App\Http\Controllers;

use App\Models\ConsultationListModel;
use Illuminate\Support\Facades\Crypt;

class MedicalLogsController extends Controller
{
    public function ViewMedicalLogsRecords(){
        $ViewFullMedicalLogs = Crypt::decrypt(session('EncryptViewFullMedicalLogs'));
        $MedicalLogs = Crypt::decrypt(session('EncryptMedicalLogs'));
        $PatientConsultation = session('PatientConsultation');
        $getAllConsultation = ConsultationListModel::all();

        return view('AdminPages.MedicalLogs', compact('ViewFullMedicalLogs','MedicalLogs','getAllConsultation','PatientConsultation'));
    }
}
