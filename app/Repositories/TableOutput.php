<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;

class TableOutput
{
        public function TableOutput(){
            
            $Data = DB::table('patientmedicallog')
                ->join('patientrecord', function (JoinClause $join){
                    $join->on('patientrecord.PatientID','=','patientmedicallog.PatientNumber');
                })
                ->select('patientmedicallog.Consultation',
                DB::raw('count(distinct PatientNumber) as NumPatient'),
                // Male Area
                DB::raw('count(distinct CASE WHEN patientrecord.Gender = "Male" THEN patientmedicallog.PatientNumber END) as NumMale'),
                DB::raw('count(distinct CASE WHEN patientrecord.Gender = "Male" AND patientrecord.Age BETWEEN 1 AND 12 THEN patientmedicallog.PatientNumber END) as NumChildMale'),
                DB::raw('count(distinct CASE WHEN patientrecord.Gender = "Male" AND patientrecord.Age BETWEEN 13 AND 19 THEN patientmedicallog.PatientNumber END) as NumTeenMale'),
                DB::raw('count(distinct CASE WHEN patientrecord.Gender = "Male" AND patientrecord.Age BETWEEN 20 AND 59 THEN patientmedicallog.PatientNumber END) as NumAdultMale'),
                DB::raw('count(distinct CASE WHEN patientrecord.Gender = "Male" AND patientrecord.Age BETWEEN 60 AND 130 THEN patientmedicallog.PatientNumber END) as NumSeniorMale'),
                // Female Area
                DB::raw('count(distinct CASE WHEN patientrecord.Gender = "Female" THEN patientmedicallog.PatientNumber END) as NumFemale'),
                DB::raw('count(distinct CASE WHEN patientrecord.Gender = "Female" AND patientrecord.Age BETWEEN 1 AND 12 THEN patientmedicallog.PatientNumber END) as NumChildFemale'),
                DB::raw('count(distinct CASE WHEN patientrecord.Gender = "Female" AND patientrecord.Age BETWEEN 13 AND 19 THEN patientmedicallog.PatientNumber END) as NumTeenFemale'),
                DB::raw('count(distinct CASE WHEN patientrecord.Gender = "Female" AND patientrecord.Age BETWEEN 20 AND 59 THEN patientmedicallog.PatientNumber END) as NumAdultFemale'),
                DB::raw('count(distinct CASE WHEN patientrecord.Gender = "Female" AND patientrecord.Age BETWEEN 60 AND 130 THEN patientmedicallog.PatientNumber END) as NumSeniorFemale'),
                )
                ->whereYear('DateOfConsultation', date('Y'))
                ->whereMonth('DateOfConsultation', date('m'))
                ->groupBy('Consultation')
                ->orderBy('NumMale','desc')
                ->get();
                return $Data;
    }
} 
// in user