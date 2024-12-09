<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class PrevRecordOfCurrentHighest
{

    public function PrevRecordOfCurrentHighest(){
        $CurrentRecord = DB::table('patientmedicallog')
        ->select('Consultation',DB::raw('count(distinct PatientNumber) as NumPatient'))
        ->whereYear('DateOfConsultation', date('Y'))
        ->whereMonth('DateOfConsultation', date('m'))
        ->groupBy('Consultation')
        ->orderBy('NumPatient','desc')
        ->first();
     
        $PrevRecord = DB::table('patientmedicallog')
        ->select(DB::raw('count(distinct PatientNumber) as PrevNumPatient'))
        ->whereMonth('DateOfConsultation', now()->subMonths(1)->month)
        ->where('Consultation',$CurrentRecord->Consultation)
        ->first();
        

        return $PrevRecord->PrevNumPatient;
        }
}