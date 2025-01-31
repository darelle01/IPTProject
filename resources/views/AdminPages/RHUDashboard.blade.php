@if(Auth::check() && Auth::user()->Position === 'Admin')
    <x-AdminNavigation>
    {{-- Script for Google 3d Pie Chart --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load ("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(fetchDashboardData);
    </script>
    {{-- Script for Google 3d Pie Chart --}}

    {{-- Script for Google Chart --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(fetchDashboardData);

    </script>
    {{-- Script for Google Chart --}}
  
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('AdminAccountCss/Dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminAccountCss/FirstArea.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminAccountCss/SecondArea.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminAccountCss/ThirdArea.css') }}">

    <x-slot name="Title">
        Dashboard
    </x-slot>
    

    {{-- Dashboard Area --}}
    <div class="DashBoardArea">
        <div class="DashboardTitle">
            <h3 class="title">Dashboard</h3>
        </div>
        {{-- First Area --}}
        <div class="FirstArea">

            {{-- Total Patient Count For this Month --}}
            <div class="ThisMonthPatientCount">
                <div class="ThisMonthPatientCountUpperLabel">
                    <span class="ThisMonth">This month</span>
                </div>
                <div class="ThisMonthPatientCountVal">
                    <span class="FinalCountThisMonth" id="Total"></span>
                </div>
                <div class="ThisMonthPatientCountLowerLabel">
                    <span class="Totalnumber">Total number of Patient</span>
                </div>
            </div>{{-- Total Patient Count For this Month --}}

            {{-- Pie Chart of this Month Label--}}
            <div class="PieChartLabelArea">
                <div class="PieChartLabel">
                    <span class="ThisMonthPieChart">
                        This Month PieChart
                    </span>
                    <span id="Month"></span>
                    <span id="Year"></span>
                </div>
            </div>{{-- Pie Chart of this Month Label--}}
            
            {{-- Pie Chart Figure Area --}}
            <div class="PieChartFigure">
                <div id="piechart_3d" style="width: 350px; height: 350px;"></div>
            </div>{{-- Pie Chart Figure Area --}}

            {{-- Highest Consultation --}}
            <div class="HighestConsultationArea" id="HighestConsultationArea">

            </div>{{-- Highest Consultation --}}

            {{-- Lowest Consultation --}}
            <div class="LowestConsultationArea" id="LowestConsultationArea">
              

                <div class="LowestConsultationLabel2" id="CurrentLowest">

                </div>
            </div>{{-- Lowest Consultation --}}            

        </div>{{-- First Area --}}
        {{-- Second Area --}}
        <div class="SecondArea">
            {{-- Table Of Consultation Area --}}
            <div class="TableOfConsultation">
                <table class="ConsultationTable">
                    <thead id="BreakDownLabel">
                  
                    </thead>
                    <tbody id="BreakDown">
                    
                    </tbody>
                </table>
            </div>{{-- Table Of Consultation Area --}} 
        </div>{{-- Second Area --}}
        {{-- Third Area --}}
        <div class="ThirdArea">
            <div class="GraphArea">
                <div id="chart_div" style="width: 1600px; height: fit-content; border-radius: 15px; overflow: hidden;"></div>
                {{-- <div id="columnchart_values" style="width: 900px; height: 300px;"></div> --}}
            </div>
        </div>{{-- Third Area --}}
    </div> {{-- Dashboard Area --}} 
    {{-- Script --}}
    <script src="{{asset('/javascript/Date.js')}}" ></script>
    <script src="{{asset ('javascript/AdminBtn/DashboardOutput.js')}}"></script>
</x-AdminNavigation>

@else
<x-StaffNavigation>
    {{-- Script for Google 3d Pie Chart --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load ("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(fetchDashboardData);
    </script>
    {{-- Script for Google 3d Pie Chart --}}

    {{-- Script for Google Chart --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(fetchDashboardData);

    </script>
    {{-- Script for Google Chart --}}
  
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('AdminAccountCss/Dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminAccountCss/FirstArea.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminAccountCss/SecondArea.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminAccountCss/ThirdArea.css') }}">

    <x-slot name="Title">
        Dashboard
    </x-slot>
    

    {{-- Dashboard Area --}}
    <div class="DashBoardArea">
        <div class="DashboardTitle">
            <h3 class="title">Dashboard</h3>
        </div>
        {{-- First Area --}}
        <div class="FirstArea">

            {{-- Total Patient Count For this Month --}}
            <div class="ThisMonthPatientCount">
                <div class="ThisMonthPatientCountUpperLabel">
                    <span class="ThisMonth">This month</span>
                </div>
                <div class="ThisMonthPatientCountVal">
                    <span class="FinalCountThisMonth" id="Total"></span>
                </div>
                <div class="ThisMonthPatientCountLowerLabel">
                    <span class="Totalnumber">Total number of Patient</span>
                </div>
            </div>{{-- Total Patient Count For this Month --}}

            {{-- Pie Chart of this Month Label--}}
            <div class="PieChartLabelArea">
                <div class="PieChartLabel">
                    <span class="ThisMonthPieChart">
                        This Month PieChart
                    </span>
                    <span id="Month"></span>
                    <span id="Year"></span>
                </div>
            </div>{{-- Pie Chart of this Month Label--}}
            
            {{-- Pie Chart Figure Area --}}
            <div class="PieChartFigure">
                <div id="piechart_3d" style="width: 350px; height: 350px;"></div>
            </div>{{-- Pie Chart Figure Area --}}

            {{-- Highest Consultation --}}
            <div class="HighestConsultationArea" id="HighestConsultationArea">

            </div>{{-- Highest Consultation --}}

            {{-- Lowest Consultation --}}
            <div class="LowestConsultationArea" id="LowestConsultationArea">
              

                <div class="LowestConsultationLabel2" id="CurrentLowest">

                </div>
            </div>{{-- Lowest Consultation --}}            

        </div>{{-- First Area --}}
        {{-- Second Area --}}
        <div class="SecondArea">
            {{-- Table Of Consultation Area --}}
            <div class="TableOfConsultation">
                <table class="ConsultationTable">
                    <thead id="BreakDownLabel">
                  
                    </thead>
                    <tbody id="BreakDown">
                    
                    </tbody>
                </table>
            </div>{{-- Table Of Consultation Area --}} 
        </div>{{-- Second Area --}}
        {{-- Third Area --}}
        <div class="ThirdArea">
            <div class="GraphArea">
                <div id="chart_div" style="width: 1600px; height: fit-content; border-radius: 15px; overflow: hidden;"></div>
                {{-- <div id="columnchart_values" style="width: 900px; height: 300px;"></div> --}}
            </div>
        </div>{{-- Third Area --}}
    </div> {{-- Dashboard Area --}} 
    {{-- Script --}}
    <script src="{{asset('/javascript/Date.js')}}" ></script>
    <script src="{{asset ('javascript/AdminBtn/DashboardOutput.js')}}"></script>
    </x-StaffNavigation>
@endif

    