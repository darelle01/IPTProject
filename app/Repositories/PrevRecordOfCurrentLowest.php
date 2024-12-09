<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class PrevRecordOfCurrentLowest
{

    public function PrevRecordOfCurrentLowest(){
        $CurrentRecord = DB::table('patientmedicallog')
        ->select('Consultation',DB::raw('count(distinct PatientNumber) as NumPatient'))
        ->whereYear('DateOfConsultation', date('Y'))
        ->whereMonth('DateOfConsultation', date('m'))
        ->groupBy('Consultation')
        ->orderBy('NumPatient','asc')
        ->first();
     
        $PastRecord = DB::table('patientmedicallog')
        ->select(DB::raw('count(distinct PatientNumber) as PastNumPatient'))
        ->whereMonth('DateOfConsultation', now()->subMonths(1)->month)
        ->where('Consultation',$CurrentRecord->Consultation)
        ->first();
        

        return $PastRecord->PastNumPatient;
        }
}