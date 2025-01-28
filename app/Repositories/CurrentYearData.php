<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CurrentYearData
{
    public function CurrentYearData()
    {
        $CurrentYearData = DB::table('patientmedicallog')
            ->select(DB::raw('MONTH(DateOfConsultation) as Month'),
                     DB::raw('COUNT(DISTINCT PatientNumber) as NumPatient'))
            ->whereYear('DateOfConsultation', Carbon::now()->year)
            ->orderBy('DateOfConsultation' , 'asc')
            ->groupBy(DB::raw('MONTH(DateOfConsultation)'))
            ->get();
        foreach ($CurrentYearData as $MonthName) {
          switch ($MonthName->Month) {
            case ($MonthName->Month === 1);
              $MonthName->Month = 'January';
              break;
              case ($MonthName->Month === 2);
              $MonthName->Month = 'Febuary';
              break;
              case ($MonthName->Month === 3);
              $MonthName->Month = 'March';
              break;
              case ($MonthName->Month === 4);
              $MonthName->Month = 'April';
              break;              
              case ($MonthName->Month === 5);
              $MonthName->Month = 'May';
              break;
              case ($MonthName->Month === 6);
              $MonthName->Month = 'June';
              break;
              case ($MonthName->Month === 7);
              $MonthName->Month = 'July';
              break;
              case ($MonthName->Month === 8);
              $MonthName->Month = 'August';
              break;
              case ($MonthName->Month === 9);
              $MonthName->Month = 'September';
              break;
              case ($MonthName->Month === 10);
              $MonthName->Month = 'October';
              break;
              case ($MonthName->Month === 11);
              $MonthName->Month = 'November';
              break;
              case ($MonthName->Month === 12);
              $MonthName->Month = 'December';
              break;
              default:
              $MonthName->Month = 'No Data';
              break;              
            }
        }
        return $CurrentYearData;
    }
}
// in user