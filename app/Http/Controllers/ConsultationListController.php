<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConsultationListModel;
use App\Models\patientmedicallog;
use Illuminate\Http\Request;


class ConsultationListController extends Controller
{
    public function ConsultationListPage(){
        $getAllConsultation = ConsultationListModel::all();
        return view('AdminPages.ConsultationList', compact('getAllConsultation'));
    }
    public function ConsultationList(Request $request){
        $ValidateNewProgram = $request->validate([
            'ConsultationList' => 'required|string|unique:consultationlist,ConsultationList',
            'ConsultationSchedule' => 'required|string',
        ]);
        ConsultationListModel::create($ValidateNewProgram);
        return redirect()->route('Admin.AddProgramView')->with('Add','Adding New Program Success!');
    }

    public function EditConsultation(Request $request){
        $EditConsultation = $request->validate([
            'OldConsul' => 'string|required',
            'EditConsul' => 'string|required',
            'OldConsulSched' => 'string|required',
            'EditConsulSched' => 'string|required', 
        ]);

        $Edit = ConsultationListModel::where('ConsultationList', $EditConsultation['OldConsul'])->first();
        
        if ($Edit) {
            $Edit->update([
                'ConsultationList' => $EditConsultation['EditConsul'],
                'ConsultationSchedule' => $EditConsultation['EditConsulSched'],
            ]);
            // Using a loop to update all related patient medical logs
            $PatientRecords = patientmedicallog::where('Consultation', $EditConsultation['OldConsul'])->get();
            foreach ($PatientRecords as $PatientRecord) {
                $PatientRecord->update([
                    'Consultation' => $EditConsultation['EditConsul'],
                ]);
            }

        }

        return redirect()->route('Admin.AddProgramView')->with('Edit','Editing Program Success!');
    }
}
