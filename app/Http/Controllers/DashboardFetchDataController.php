<?php

namespace App\Http\Controllers;

use App\Repositories\PieChart;
use App\Repositories\MaleCount;
use App\Repositories\FemaleCount;
use App\Repositories\ConsultationAsc;
use App\Repositories\ConsultationDesc;
use App\Repositories\TotalPatientThisMonth;
use App\Repositories\LowestConsultationValue;
use App\Repositories\HighestConsultationValue;
use App\Repositories\PrevDataOfCurrentLowestData;
use App\Repositories\PrevDataOfCurrentHighestData;

class DashboardFetchDataController extends Controller
{
    protected $totalPatientThisMonth;
    protected $pieChart;
    protected $consultationDesc;
    protected $highestConsultationValue;
    protected $prevDataOfCurrentHighestData;
    protected $lowestConsultationValue;
    protected $prevDataOfCurrentLowestData;
    protected $consultationAsc;
    protected $femaleCount;
    protected $maleCount;
  
    public function __construct(TotalPatientThisMonth $totalPatientThisMonth, PieChart $pieChart, ConsultationDesc $consultationDesc
                               , HighestConsultationValue $highestConsultationValue, PrevDataOfCurrentHighestData $prevDataOfCurrentHighestData,
                                LowestConsultationValue $lowestConsultationValue, PrevDataOfCurrentLowestData $prevDataOfCurrentLowestData,                             
                               ConsultationAsc $consultationAsc, FemaleCount $femaleCount, MaleCount $maleCount)
    {
        // Total Patient This Month
        $this->totalPatientThisMonth = $totalPatientThisMonth;
        // PieChart
        $this->pieChart = $pieChart;
        // Consultation Highest to Lowest
        $this->consultationDesc = $consultationDesc;
        // Highet Consultation Value
        $this->highestConsultationValue = $highestConsultationValue;
        // Compate the Highest Consultation to its past record
        $this->prevDataOfCurrentHighestData = $prevDataOfCurrentHighestData;
        // Consultation Lowest to Highest
        $this->consultationAsc = $consultationAsc;
        // Lowest Consultation Value
        $this->lowestConsultationValue = $lowestConsultationValue; 
        // Compate the Lowest Consultation to its past record       
        $this->prevDataOfCurrentLowestData = $prevDataOfCurrentLowestData;
        // female area 
        $this->femaleCount = $femaleCount;    
        // male area
        $this->maleCount = $maleCount;
    }

    public function DashboardFetchData()
    {
        // total patient this month
        $ThisMonthTotalPatient = $this->totalPatientThisMonth->CurrentMonthTotalPatient();
        // PieChart
        $Pie = $this->pieChart->PieChart();
        // Consultation Highest to Lowest
        $HighestConsul = $this->consultationDesc->ConsultationDesc();
        // Highet Consultation Value
        $HighestConsultationValue = $this->highestConsultationValue->HighestConsultationValue();
        // Compate the Highest Consultation to its past record
        $PrevDataOfCurrentHighestData = $this->prevDataOfCurrentHighestData->PrevDataOfCurrentHighestData();
        // Consultation Lowest to Highest
        $LowestConsul = $this->consultationAsc->ConsultationAsc();
        // Lowest Consultation Value
        $LowestConsultationValue = $this->lowestConsultationValue->LowestConsultationValue();
        // Compate the Lowest Consultation to its past record
        $PrevDataOfCurrentLowestData = $this->prevDataOfCurrentLowestData->PrevDataOfCurrentLowestData();
        // female area
        $TotalFemaleCount = $this->femaleCount->FemaleCount();
        // male area
        $TotalMaleCount = $this->maleCount->MaleCount();

        // Computatation
        // Highset 
        if ($HighestConsultationValue === null) {
            $HighestConsultationValue = 0;
        }
        if ($PrevDataOfCurrentHighestData === 0) {
            $HighConsulDiff = 'No Data';
        } elseif ($PrevDataOfCurrentHighestData === $HighestConsultationValue){
            $HighConsulDiff = ($HighestConsultationValue - $PrevDataOfCurrentHighestData) / $PrevDataOfCurrentHighestData * 100;
        } elseif ($PrevDataOfCurrentHighestData > $HighestConsultationValue) {
            $HighConsulDiff = ($HighestConsultationValue - $PrevDataOfCurrentHighestData) / $PrevDataOfCurrentHighestData * 100;
        } elseif ($PrevDataOfCurrentHighestData < $HighestConsultationValue) {
            $HighConsulDiff = ($HighestConsultationValue - $PrevDataOfCurrentHighestData) / $PrevDataOfCurrentHighestData * 100;
        }
        // Lowest
        if ($LowestConsultationValue === null) {
            $LowestConsultationValue = 0;
        }
        if ($PrevDataOfCurrentLowestData === 0) {
            $LowConsulDiff = 'No Data';
        } elseif ($PrevDataOfCurrentLowestData === $LowestConsultationValue){
            $LowConsulDiff = ($LowestConsultationValue - $PrevDataOfCurrentLowestData) / $PrevDataOfCurrentLowestData * 100;
        } elseif ($PrevDataOfCurrentLowestData > $LowestConsultationValue) {
            $LowConsulDiff = ($LowestConsultationValue - $PrevDataOfCurrentLowestData) / $PrevDataOfCurrentLowestData * 100;
        } elseif ($PrevDataOfCurrentLowestData < $LowestConsultationValue) {
            $LowConsulDiff = ($LowestConsultationValue - $PrevDataOfCurrentLowestData) / $PrevDataOfCurrentLowestData * 100;
        }

          
        return response()->json([
            'TotalForThisMonth' => $ThisMonthTotalPatient,
            'Pie' => $Pie,
            'HighestConsul' => $HighestConsul,
            'HighestConsultationValue' => $HighestConsultationValue,
            'PrevDataOfCurrentHighestData' => $PrevDataOfCurrentHighestData,
            'HighConsulDiff' => $HighConsulDiff,
            'LowestConsul' => $LowestConsul,
            'LowestConsultationValue' => $LowestConsultationValue,
            'PrevDataOfCurrentLowestData' => $PrevDataOfCurrentLowestData,
            'LowConsulDiff' => $LowConsulDiff,
            'TotalFemaleCount' => $TotalFemaleCount,
            'TotalMaleCount' => $TotalMaleCount
        ]);   
    }
}