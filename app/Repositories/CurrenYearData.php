<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CurrenYearData
{
        public function CurrentYearData(){

            $CurrentYearData = DB::table('patientmedicallog')
            ->select('count(distinct PatientNumber) as NumPatient')
            ->whereYear('DateOfConsultation', Carbon::now()->year)
            ->groupBy('DateOfConsultation', date('m'))
            ->get();

            $CurrentYearData;
    }
} 
// in user