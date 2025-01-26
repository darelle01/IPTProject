<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class LowestConsultationValue
{
    public function LowestConsultationValue()
    {
       $ValueOfLowestConsultation = DB::table('patientmedicallog')
            ->select(DB::raw('count(distinct PatientNumber) as NumPatient'))
            ->whereYear('DateOfConsultation', date('Y'))
            ->whereMonth('DateOfConsultation', date('m'))
            ->groupBy('Consultation')
            ->orderBy('NumPatient','asc')
            ->first();
            if ($ValueOfLowestConsultation === null) {
                return $ValueOfLowestConsultation = 0;
            }  
        return $ValueOfLowestConsultation->NumPatient;
    }
}
// in user