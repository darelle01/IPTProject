<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class TotalPatientPerConsultation
{
    
    public function TotalPatientPerConsul(){
        $DecsTotalPatientPerConsul = DB::table('patientmedicallog')
            ->select('Consultation',DB::raw('count(distinct PatientNumber) as NumPatient'))
            ->whereYear('DateOfConsultation', date('Y'))
            ->whereMonth('DateOfConsultation', date('m'))
            ->groupBy('Consultation')
            ->orderBy('NumPatient','desc')
            ->get();
            return $DecsTotalPatientPerConsul;
    }
}