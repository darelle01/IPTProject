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
        
            foreach ($TotalPatientPerConsul as $ChangeNameOfMonths) {
              if ($ChangeNameOfMonths->month === 1) {
                $ChangeNameOfMonths->month = 'January';
              }
              elseif ($ChangeNameOfMonths->month === 2) {
                $ChangeNameOfMonths->month = 'February';
              }
              elseif ($ChangeNameOfMonths->month === 3) {
                $ChangeNameOfMonths->month = 'March';
              }
              elseif ($ChangeNameOfMonths->month === 4) {
                $ChangeNameOfMonths->month = 'April';
              }
              elseif ($ChangeNameOfMonths->month === 5) {
                $ChangeNameOfMonths->month = 'May';
              }
              elseif ($ChangeNameOfMonths->month === 6) {
                $ChangeNameOfMonths->month = 'June';
              }
              elseif ($ChangeNameOfMonths->month === 7) {
                $ChangeNameOfMonths->month = 'July';
              }
              elseif ($ChangeNameOfMonths->month === 8) {
                $ChangeNameOfMonths->month = 'August';
              }
              elseif ($ChangeNameOfMonths->month === 9) {
                $ChangeNameOfMonths->month = 'September';
              }
              elseif ($ChangeNameOfMonths->month === 10) {
                $ChangeNameOfMonths->month = 'October';
              }
              elseif ($ChangeNameOfMonths->month === 11) {
                $ChangeNameOfMonths->month = 'November';
              }
              elseif ($ChangeNameOfMonths->month === 12) {
                $ChangeNameOfMonths->month = 'December';
              }

            }
            return $TotalPatientPerConsul;
    }
}

