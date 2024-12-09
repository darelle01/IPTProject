<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class TotalConsultationPerMonth
{
    
    public function TotalPatientPerConsul(){
        $TotalPatientPerConsul = DB::table('patientmedicallog')
            ->select(DB::raw('Month(DateOfConsultation) as month, count(patientmedicallog.PatientNumber) as TotalPerMonth'))    
            ->groupBy(DB::raw('month(DateOfConsultation)'))
            ->get();
            return $TotalPatientPerConsul;
    }
}

