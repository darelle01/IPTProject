<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ConsultationAsc
{
        public function ConsultationAsc(){
            $AscConsul = [];
            $AscConsul = DB::table('patientmedicallog')
            ->select('Consultation',DB::raw('count(distinct PatientNumber) as NumPatient'))
            ->whereYear('DateOfConsultation', date('Y'))
            ->whereMonth('DateOfConsultation', date('m'))
            ->groupBy('Consultation')
            ->orderBy('NumPatient','asc')
            ->get();
            
            return $AscConsul;
    }
} 
// in user