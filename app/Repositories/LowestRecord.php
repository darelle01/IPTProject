<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class LowestRecord
{

    public function CurrentLowestRecord(){
        $LowestRecord = DB::table('patientmedicallog')
            ->select(DB::raw('count(distinct PatientNumber) as NumPatient'))
            ->whereYear('DateOfConsultation', date('Y'))
            ->whereMonth('DateOfConsultation', date('m'))
            ->groupBy('Consultation')
            ->orderBy('NumPatient', 'asc')
            ->orderBy('DateOfConsultation', 'asc')
            ->first();

        if ($LowestRecord === null) {
            return $LowestRecord = 0;
        } else {
            return $LowestRecord->NumPatient;
        }
    }

}