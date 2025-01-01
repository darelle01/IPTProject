<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class LowestConsultation
{

    public function CurrentLowestConsultation(){
        $LowestRecord = DB::table('patientmedicallog')
            ->select('Consultation',DB::raw('count(distinct PatientNumber) as NumPatient'))
            ->whereYear('DateOfConsultation', date('Y'))
            ->whereMonth('DateOfConsultation', date('m'))
            ->groupBy('Consultation')
            ->orderBy('NumPatient','asc')
            ->first();
         
        if ($LowestRecord === null) {
            return $LowestRecord = 0;
        } else {
            return $LowestRecord->NumPatient;
        }
          
    }
}