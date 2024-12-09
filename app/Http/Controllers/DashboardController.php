<?php

namespace App\Http\Controllers;

use App\Repositories\AdultFemaleCount;
use App\Repositories\ChildFemaleCount;
use App\Repositories\ChildMaleCount;
use App\Repositories\FemaleCount;
use App\Repositories\PieChart;
use App\Repositories\MaleCount;
use App\Repositories\SeniorFemale;
use App\Repositories\SeniorMale;
use App\Repositories\LowestRecord;
use App\Repositories\HighestRecord;
use App\Repositories\TeenFemaleCount;
use App\Repositories\TeenMaleCount;
use App\Repositories\AdultMaleCount;
use App\Repositories\ConsultationDesc;
use App\Repositories\LowestConsultation;
use App\Repositories\HighestConsultation;
use App\Repositories\TotalConsultationPerMonth;
use App\Repositories\TotalPatientThisMonth;
use App\Repositories\PrevRecordOfCurrentLowest;
use App\Repositories\PrevRecordOfCurrentHighest;
use App\Repositories\TotalPatientPerConsultation;

class DashboardController extends Controller
{
    
    protected $totalPatientThisMonth;
    protected $highestRecord;
    protected $lowestRecord;
    protected $highestConsultation;
    protected $lowestConsultation;
    protected $prevRecordOfCurrentHighest;
    protected $prevRecordOfCurrentLowest;
    protected $pieChart;
    protected $consultationDesc;
    protected $totalPatientPerConsultation;
    protected $adultMaleCount;
    protected $seniorMale;
    protected $maleCount;
    protected $teenMaleCount;
    protected $childMaleCount;
    protected $femaleCount;
    protected $adultFemaleCount;
    protected $seniorFemale;
    protected $teenFemaleCount;
    protected $childFemaleCount;
    protected $totalConsultationPerMonth;
    public function __construct(TotalPatientThisMonth $totalPatientThisMonth, HighestRecord $highestRecord, LowestRecord $lowestRecord, 
                                HighestConsultation $highestConsultation, LowestConsultation $lowestConsultation, PrevRecordOfCurrentHighest $prevRecordOfCurrentHighest,
                                PrevRecordOfCurrentLowest $prevRecordOfCurrentLowest, PieChart $pieChart, ConsultationDesc $consultationDesc,
                                TotalPatientPerConsultation $totalPatientPerConsultation, AdultMaleCount $adultMaleCount, SeniorMale $seniorMale,
                                MaleCount $maleCount, TeenMaleCount $teenMaleCount, ChildMaleCount $childMaleCount, FemaleCount $femaleCount,
                                AdultFemaleCount $adultFemaleCount, SeniorFemale $seniorFemale, TeenFemaleCount $teenFemaleCount, ChildFemaleCount $childFemaleCount,
                                TotalConsultationPerMonth $totalConsultationPerMonth)
    {
        $this->totalPatientThisMonth = $totalPatientThisMonth;
        $this->highestRecord = $highestRecord;
        $this->lowestRecord = $lowestRecord;
        $this->highestConsultation = $highestConsultation;
        $this->lowestConsultation = $lowestConsultation;
        $this->prevRecordOfCurrentHighest = $prevRecordOfCurrentHighest;
        $this->prevRecordOfCurrentLowest = $prevRecordOfCurrentLowest;
        $this->pieChart = $pieChart;
        $this->consultationDesc = $consultationDesc;
        $this->totalPatientPerConsultation = $totalPatientPerConsultation;
        // male area
        $this->maleCount = $maleCount;
        $this->seniorMale = $seniorMale;
        $this->adultMaleCount = $adultMaleCount;
        $this->teenMaleCount = $teenMaleCount;
        $this->childMaleCount = $childMaleCount;
        // female area 
        $this->femaleCount = $femaleCount;    
        $this->seniorFemale = $seniorFemale;
        $this->adultFemaleCount = $adultFemaleCount;
        $this->teenFemaleCount = $teenFemaleCount;
        $this->childFemaleCount = $childFemaleCount;

        $this->totalConsultationPerMonth = $totalConsultationPerMonth;

    }

    public function ShowDashboard()
    {

        $ThisMonthTotal = $this->totalPatientThisMonth->CurrentMonthTotalPatient();
        $PieChartModel = $this->pieChart->PieChart();
        $CurrentHighestRecord = $this->highestRecord->CurrentHighestRecord();
        $CurrentLowestRecord = $this->lowestRecord->CurrentLowestRecord();
        $CurrentHighestConsultation = $this->highestConsultation->CurrentHighestConsultation();
        $CurrentLowestConsulatation = $this->lowestConsultation->CurrentLowestConsultation();
        $PreviousRecordofCurrentHighest = $this->prevRecordOfCurrentHighest->PrevRecordOfCurrentHighest();
        $PreviousRecordofCurrentLowest = $this->prevRecordOfCurrentLowest->PrevRecordOfCurrentLowest();
        $ConsultationDescending = $this->consultationDesc->ConsultationDesc();
        $TotalPatientPerConsul = $this->totalPatientPerConsultation->TotalPatientPerConsul();
        // male area
        $TotalMaleCount = $this->maleCount->MaleCount();
        $SeniorMaleCountPerConsul = $this->seniorMale->SeniorMaleCount();
        $AdultMaleCountPerConsul = $this->adultMaleCount->AdultMaleCount();
        $TeenMaleCountPerConsul = $this->teenMaleCount->TeenMaleCount();
        $ChildMaleCountPerConsul = $this->childMaleCount->ChildMaleCount();
        // female area
        $TotalFemaleCount = $this->femaleCount->FemaleCount();
        $SeniorFemaleCountPerConsul = $this->seniorFemale->SeniorFemaleCount();
        $AdultFemaleCountPerConsul = $this->adultFemaleCount->AdultFemaleCount();
        $TeenFemaleCountPerConsul = $this->teenFemaleCount->TeenFemaleCount();
        $ChildFemaleCountPerConsul = $this->childFemaleCount->ChildFemaleCount();

        $NumberOfConsultationPerMonth = $this->totalConsultationPerMonth->TotalPatientPerConsul();
               
        // Comaparison of Current Highest Record to its Past Record
        if ($PreviousRecordofCurrentHighest === 0) {
            $PercentageCurrentHighest = "There is no previous record";
        }else{
            $Sub = $CurrentHighestRecord - $PreviousRecordofCurrentHighest;
            $Div = $Sub / $PreviousRecordofCurrentHighest;
            $PercentageCurrentHighest = $Div * 100;
        }

        // Comaparison of Current Lowest Record to its Past Record
        if ($PreviousRecordofCurrentLowest === 0) {
            $PercentageCurrentLowest = "There is no previous record";
        }else{
            $Sub = $CurrentLowestRecord - $PreviousRecordofCurrentLowest;
            $Div = $Sub / $PreviousRecordofCurrentLowest;
            $PercentageCurrentLowest = $Div * 100;
        }
        
        return view('AdminPages.RHUDashboard', compact(
            'ThisMonthTotal',
            'PieChartModel',
            'CurrentHighestRecord',
            'CurrentLowestRecord',
            'CurrentHighestConsultation',
            'CurrentLowestConsulatation',
            'PreviousRecordofCurrentHighest',
            'PercentageCurrentHighest',
            'PreviousRecordofCurrentLowest',
            'PercentageCurrentLowest',
            'ConsultationDescending',
            'TotalPatientPerConsul',
            // male area
            'TotalMaleCount',
            'SeniorMaleCountPerConsul',
            'AdultMaleCountPerConsul',
            'TeenMaleCountPerConsul',
            'ChildMaleCountPerConsul',
            // female area
            'TotalFemaleCount',
            'SeniorFemaleCountPerConsul',
            'AdultFemaleCountPerConsul',
            'TeenFemaleCountPerConsul',
            'ChildFemaleCountPerConsul',

            'NumberOfConsultationPerMonth',
        ));
    }
}
