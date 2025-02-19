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

    {{-- Dashboard --}}
    <div class="DashboardForm bg-neutral-400 us:mt-3 us:w-5/6 us:h-fit us:max-h-[700px] md:max-h-full us:mx-auto us:grid us:grid-flow-row us:rounded-md us:overflow-auto md:w-11/12">

        <div class="Title bg-blue-500 us:h-fit us:w-full us:rounded-t-md us:m-0 us:p-0 md:flex md:h-[50px]">
            <span class="DashboardTitle text-white us:italic us:px-5 us:py-2 us:font-semibold font-font-Arial md:text-3xl md:my-auto">Dashboard</span>
        </div>
        <div class="FirstArea us:full us:h-fit grid us:grid-cols-2 us:m-0 us:p-0 md:grid-cols-3 text-white">
            <div class="ThisMonthCount w-full h-full us:text-center us:grid us:grid-rows-3">
                <span class=" us:text-tiny us:font-semibold font-font-Arial us:m-2 md:text-lg">This Month</span>
                <span class=" us:text-md us:font-semibold font-font-Arial us:mx-2 md:text-4xl" id="Total"></span>  
                <span class=" us:text-tiny us:font-semibold font-font-Arial us:m-2 md:text-sm">Total Patient</span>
            </div>
            <div class="Month w-full h-full us:text-center us:grid us:grid-rows-3">
                <span class=" us:text-tiny us:font-semibold font-font-Arial us:m-2 md:text-lg">This Month PieChart</span>
                <span class=" us:text-md us:font-semibold font-font-Arial us:mx-2 md:text-4xl" id="Month"></span>
                <span class=" us:text-md us:font-semibold font-font-Arial us:mx-2 md:text-sm" id="Year"></span>
            </div>
            <div class="PieChartFigure w-full h-fit us:justify-center us:col-span-2 md:col-span-1 md:row-span-2 md:h-full">
                <div id="piechart_3d" class=" us:m-0 us:p-0 us:w-full us:h-full" style=""></div>
            </div>
            <div class="Highest us:text-center us:col-span-2 us:grid us:grid-rows-3 md:col-span-1" id="HighestConsultationArea">
            </div>
            <div class="Lowest us:text-center us:col-span-2 us:grid us:grid-rows-3 md:col-span-1" id="LowestConsultationArea">
            </div>
        </div>
        <div class="SecondArea us:w-full us:h-auto us:m-0 us:p-0 us:overflow-auto">
             {{-- Table Of Consultation Area --}}
             <div class=" us:w-full us:h-auto px-1">
                <table class="text-center border table table-striped table-hover">

                    <thead id="BreakDownLabel" class="">
                  
                    </thead>
                    <tbody id="BreakDown">
                    
                    </tbody>
                </table>
             </div>
            {{-- Table Of Consultation Area --}}
        </div>
        <div class="ThirdArea us:w-full us:h-fit us:m-0 us:p-0 us:overflow-auto">
            <div class="Graph w-full us:w-full h-fit">
                <div id="chart_div" class="us:w-full us:h-fit us:min-h-fit us:text-tiny" style=" overflow: hidden;"></div>
            </div>
        </div>
    </div>{{-- Dashboard --}}

    
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
                    <thead id="BreakDownLabel" class="">
                  
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

    