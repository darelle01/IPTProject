<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class PieChart
{
    public function PieChart()
    {
        $PieChart = DB::table('patientmedicallog')
        ->select('Consultation',DB::raw('count(distinct patientmedicallog.PatientNumber) as NumPatient'))
        ->whereYear('patientmedicallog.DateOfConsultation', date('Y'))
        ->whereMonth('patientmedicallog.DateOfConsultation', date('m'))
        ->groupBy('Consultation')
        ->get();

        return $PieChart;
    }
} 