<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class PrevDataOfCurrentHighestData
{
        public function PrevDataOfCurrentHighestData(){
            
            $CurrentData = DB::table('patientmedicallog')
            ->select('Consultation',DB::raw('count(distinct PatientNumber) as NumPatient'))
            ->whereYear('DateOfConsultation', date('Y'))
            ->whereMonth('DateOfConsultation', date('m'))
            ->groupBy('Consultation')
            ->orderBy('NumPatient', 'desc')
            ->first();

            if ($CurrentData === null) {
                return $PrevData = 0;
            }

            $Find = $CurrentData->Consultation;

            $PrevData = DB::table('patientmedicallog')
            ->select('Consultation',DB::raw('count(distinct PatientNumber) as NumPatient'))
            ->whereMonth('DateOfConsultation', now()->subMonths(1)->month)
            ->where('Consultation', $Find)
            ->groupBy('Consultation')
            ->first();
            if ($PrevData === null) {
                return $PrevData = 0;
            }
            return $PrevData->NumPatient;
    }
} 
// in user