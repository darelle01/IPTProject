<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;

class SeniorMale
{
    public function SeniorMaleCount(){
        $SeniorMale = DB::table('patientrecord')
        ->join('patientmedicallog', function (JoinClause $join) {
        $join->on('patientrecord.PatientID', '=', 'patientmedicallog.PatientNumber');
        })
        ->select(
            'patientmedicallog.Consultation',
            DB::raw('count(distinct patientmedicallog.PatientNumber) as TotalConsultations'),
            DB::raw("count(distinct CASE WHEN patientrecord.Gender = 'Male' AND patientrecord.Age BETWEEN 60 AND 120 THEN patientmedicallog.PatientNumber END) as MaleSenior"),
            )
            ->whereYear('patientmedicallog.DateOfConsultation', date('Y'))
            ->whereMonth('patientmedicallog.DateOfConsultation', date('m'))
            ->groupBy('patientmedicallog.Consultation')
            ->orderBy('TotalConsultations', 'desc')
            ->orderBy('patientmedicallog.DateOfConsultation', 'desc')
            ->get();

        return $SeniorMale;
    }
} 