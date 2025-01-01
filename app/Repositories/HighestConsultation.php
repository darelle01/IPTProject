<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class HIghestConsultation
{

    public function CurrentHighestConsultation(){
        $HighestRecord = DB::table('patientmedicallog')
            ->select('Consultation',DB::raw('count(distinct PatientNumber) as NumPatient'))
            ->whereYear('DateOfConsultation', date('Y'))
            ->whereMonth('DateOfConsultation', date('m'))
            ->groupBy('Consultation')
            ->orderBy('NumPatient','desc')
            ->first();
         
        if ($HighestRecord === null) {
            return $HighestRecord = 0;
        } else {
            return $HighestRecord->Consultation;
        }
    }

}