<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class HighestConsultationValue
{
    public function HighestConsultationValue()
    {
        $ValueOfHighestConsultation = DB::table('patientmedicallog')
            ->select(DB::raw('count(distinct PatientNumber) as NumPatient'))
            ->whereYear('DateOfConsultation', date('Y'))
            ->whereMonth('DateOfConsultation', date('m'))
            ->groupBy('Consultation')
            ->orderBy('NumPatient','desc')
            ->first();
            if ($ValueOfHighestConsultation === null) {
                return $ValueOfHighestConsultation = 0;
            }  
        return $ValueOfHighestConsultation->NumPatient;
    }
}
// in user