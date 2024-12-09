<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class HighestRecord
{

    public function CurrentHighestRecord(){
        $HighestRecord = DB::table('patientmedicallog')
            ->select(DB::raw('count(distinct PatientNumber) as NumPatient'))
            ->whereYear('DateOfConsultation', date('Y'))
            ->whereMonth('DateOfConsultation', date('m'))
            ->groupBy('Consultation')
            ->orderBy('NumPatient', 'desc')
            ->orderBy('DateOfConsultation', 'asc')
            ->first();

        return $HighestRecord->NumPatient;
    }

}