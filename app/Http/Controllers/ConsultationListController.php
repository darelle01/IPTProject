<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConsultationListModel;
use Illuminate\Http\Request;


class ConsultationListController extends Controller
{
    public function ConsultationListPage(){
        $getAllConsultation = ConsultationListModel::all();
        return view('AdminPages.ConsultationList', compact('getAllConsultation'));
    }
    public function ConsultationList(Request $request){
        $AddProgram = $request->validate([
            'ConsultationList' => 'required|string|unique:consultationlist,ConsultationList'
        ]);
        ConsultationListModel::create($AddProgram);
        return redirect()->route('Admin.AddProgramView')->with('Add','Adding New Program Success!');
    }

    public function EditConsultation(Request $request){
        $EditConsultation = $request->validate([
            'OldConsul' => 'string|required',
            'EditConsul' => 'string|required', 
        ]);

        $Edit = ConsultationListModel::where('ConsultationList', $EditConsultation['OldConsul'])->first();
        
        if ($Edit) {
            $Edit->update([
                'ConsultationList' => $EditConsultation['EditConsul'],
               
            ]);
        }

        return redirect()->route('Admin.AddProgramView')->with('Edit','Adding New Program Success!');
    }
}
