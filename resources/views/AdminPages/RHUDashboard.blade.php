@if(Auth::check() && Auth::user()->Position === 'Admin')
    <x-AdminNavigation>
   
    {{-- Script for Google 3d Pie Chart --}}
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
       google.charts.load ("current", {packages:["corechart"]});
       google.charts.setOnLoadCallback(drawChart);
       function drawChart() {
        console.log(1);
         var data = google.visualization.arrayToDataTable([
             ['Consultation', 'NumPatient'],
             @foreach ($PieChartModel as $data)
             ['{{ $data->Consultation }}', {{ $data->NumPatient }}],
             @endforeach ]
           );
 
         var options = {
           is3D: true,
           backgroundColor: { fill: 'transparent' },
           legend: 'none',
           pieStartAngle: 90,
           chartArea: { left: '5%', top: '0', width: '90%', height: '80%'},
           titleTextStyle: { color: 'black', fontName: 'Arial', fontSize: 18, italic: true, bold: true }
         };
         
         var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
         chart.draw(data, options);
       }
       google.charts.setOnLoadCallback(drawChart).empty();
       google.charts.setOnLoadCallback(drawChart);       
       setInterval(drawChart, 15000);
    </script>
   {{-- Script for Google 3d Pie Chart --}}

   {{-- Script for Google Chart --}}
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
     google.charts.load('current', {'packages':['corechart']});
     google.charts.setOnLoadCallback(drawVisualization);
     function drawVisualization() {
       
       var data = google.visualization.arrayToDataTable([
           ['month', 'TotalPerMonth'],
             @foreach ($NumberOfConsultationPerMonth as $data)
             ['{{ $data->month }}', {{ $data->TotalPerMonth }}],
             @endforeach 
       ]);

       var options = {
         title : 'Number of patients for each month.',
         vAxis: {title: 'Patients'},
         hAxis: {title: 'Month'},
         seriesType: 'bars',
         series: {5: {type: 'line'}},
         chartArea: { left: '6%', top: '30%', width: '100%', height: '50%' }
       };

       var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
       chart.draw(data, options);
     }
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
                   <span class="FinalCountThisMonth">{{$ThisMonthTotal}}</span>
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
           <div class="HighestConsultationArea">
               <div class="HighestConsultationLabel1">
                   <span class="HighestConsultation">Current Highest</span>
               </div>  

               <div class="HighestConsultationValue">
                   <span class="HighestConsultation">
                       {{$CurrentHighestConsultation}}
                   </span>
                   <span class="HighestConsultationPercentage">
                       Patient: {{$CurrentHighestRecord}}  
                   </span>
               </div>
  
                   @elseif($CurrentHighestRecord > $PreviousRecordofCurrentHighest)
                   <span class="">
                       There is a {{number_format(abs($PercentageCurrentHighest),2)}}% 
                       <i class="fa-solid fa-up-long"></i>
                   </span> 
                   @elseif($CurrentHighestRecord < $PreviousRecordofCurrentHighest)
                   <span class="">
                       There is a {{number_format(abs($PercentageCurrentHighest),2)}}% 
                       <i class="fa-solid fa-down-long"></i>
                   </span> 
                   @else
                   <span class="">The number of patients is same compare to the past month.</span>
                   @endif
               </div>
           </div>{{-- Highest Consultation --}}

           {{-- Lowest Consultation --}}
           <div class="LowestConsultationArea">
               <div class="LowestConsultationLabel1">
                   <span class="LowestConsultation">Current Lowest</span>
               </div>
               <div class="LowestConsultationValue">
                   <span class="LowestConsultation">
                       {{$CurrentLowestConsulatation}}
                   </span>
                   <span class="LowestConsultationPercentage">
                       Patient: {{$CurrentLowestRecord}}
                   </span>
               </div>

               <div class="LowestConsultationLabel2">
                   @if($PreviousRecordofCurrentLowest === 0)
                   <span class="">
                      {{$PercentageCurrentLowest}}
                   </span>
                   @elseif($CurrentLowestRecord > $PreviousRecordofCurrentLowest)
                       <span class="">
                           There is an increase of {{ number_format(abs($PercentageCurrentLowest), 2) }}% 
                           <i class="fa-solid fa-up-long"></i>
                       </span>
                   @elseif($CurrentLowestRecord < $PreviousRecordofCurrentLowest)
                       <span class="">
                           There is a decrease of {{ number_format(abs($PercentageCurrentLowest), 2) }}% 
                           <i class="fa-solid fa-down-long"></i>
                       </span>
                   @else
                       <span class="">The number of patients is the same as the past month.</span>
                   @endif
               </div>
           </div>{{-- Lowest Consultation --}}            

       </div>{{-- First Area --}}
       {{-- Second Area --}}
       <div class="SecondArea">
           {{-- Table Of Consultation Area --}}
           <div class="TableOfConsultation">
               <table class="ConsultationTable">
                   <tr>
                       <th class="Consultation">Consultation</th>
                       <th class="TotalNumberPatient">Total Number of Patient</th>
                       <th class="Male">Male</th>
                       <th class="SeniorMale">Senior Male</th>
                       <th class="AdultMale">Adult Male</th>
                       <th class="TeenMale">Teen Male</th>
                       <th class="ChildMale">Child Male</th>
                       <th class="Female">Female</th>
                       <th class="SeniorFemale">Senior Female</th>
                       <th class="AdultFemale">Adult Female</th>
                       <th class="TeenFemale">Teen Female</th>
                       <th class="ChildFemale">Child Female</th>
                   </tr>
                  
                   <tr>
                       {{-- Consultation --}}
                       <td class="ConsultationVal">
                           @foreach($ConsultationDescending as $Desc)
                           <div class="ConsultationCountVal">
                               {{$Desc->Consultation}}
                           </div>
                           @endforeach
                       </td>
                     

                       {{-- Number of patient per consultation --}}
                       <td class="TotalNumberPatientVal">
                           @foreach($TotalPatientPerConsul as $TotalNumOfPatients)
                           <div class="TotalCountVal">
                                   {{$TotalNumOfPatients->NumPatient}}
                           </div>
                           @endforeach
                       </td>

                       {{-- Male --}}
                       <td class="MaleVal">
                           @foreach($TotalMaleCount as $Male)
                           <div class="AdultMaleCountVal">
                                   {{$Male->NumMale}}
                           </div>
                           @endforeach
                       </td>
                       <td class="SeniorMaleVal">
                           @foreach($SeniorMaleCountPerConsul as $SeniorMaleCount)
                           <div class="SeniorMaleCountVal">
                                   {{$SeniorMaleCount->MaleSenior}}
                           </div>
                           @endforeach
                       </td>
                       <td class="AdultMaleVal">
                           @foreach($AdultMaleCountPerConsul as $AdultMaleCount)
                           <div class="AdultMaleCountVal">
                                   {{$AdultMaleCount->MaleAdult}}
                           </div>
                           @endforeach
                       </td>
                       <td class="TeenMaleVal">
                           @foreach($TeenMaleCountPerConsul as $TeenMaleCount)
                           <div class="TeenMaleCountVal">
                                   {{$TeenMaleCount->MaleTeen}}
                           </div>
                           @endforeach
                       </td>
                       <td class="ChildMaleVal">
                           @foreach($ChildMaleCountPerConsul as $ChildMaleCount)
                           <div class="ChildMaleCountVal">
                                   {{$ChildMaleCount->MaleChild}}
                           </div>
                           @endforeach
                       </td>
                       {{-- Female --}}
                       <td class="FemaleVal">
                           @foreach($TotalFemaleCount as $Female)
                           <div class="AdultFemaleCountVal">
                                   {{$Female->NumFemale}}
                           </div>
                           @endforeach
                       </td>
                       <td class="SeniorFemaleVal">
                           @foreach($SeniorFemaleCountPerConsul as $SeniorFemaleCount)
                           <div class="SeniorFemaleCountVal">
                                   {{$SeniorFemaleCount->FemaleSenior}}
                           </div>
                           @endforeach
                       </td>
                       <td class="AdultFemaleVal">
                           @foreach($AdultFemaleCountPerConsul as $AdultFemaleCount)
                           <div class="AdultFemaleCountVal">
                                   {{$AdultFemaleCount->FemaleAdult}}
                           </div>
                           @endforeach
                       </td>
                       <td class="TeenFemaleVal">
                           @foreach($TeenFemaleCountPerConsul as $TeenFemaleCount)
                           <div class="TeenFemaleCountVal">
                                   {{$TeenFemaleCount->FemaleTeen}}
                           </div>
                           @endforeach
                       </td>
                       <td class="ChildFemaleVal">
                           @foreach($ChildFemaleCountPerConsul as $ChildFemaleCount)
                           <div class="ChildFemaleCountVal">
                                   {{$ChildFemaleCount->FemaleChild}}
                           </div>
                           @endforeach
                       </td>
                   </tr>
           
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
</x-AdminNavigation>

@else
    <x-StaffNavigation>
    {{-- Script for Google 3d Pie Chart --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load ("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
              ['Consultation', 'NumPatient'],
              @foreach ($PieChartModel as $data)
              ['{{ $data->Consultation }}', {{ $data->NumPatient }}],
              @endforeach ]
            );
  
          var options = {
            is3D: true,
            backgroundColor: { fill: 'transparent' },
            legend: 'none',
            pieStartAngle: 90,
            chartArea: { left: '5%', top: '0', width: '90%', height: '80%'},
            titleTextStyle: { color: 'black', fontName: 'Arial', fontSize: 18, italic: true, bold: true }
          };
  
          var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
          chart.draw(data, options);
      
        }
    // </script>
    {{-- Script for Google 3d Pie Chart --}}

    {{-- Script for Google Chart --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {   
        var data = google.visualization.arrayToDataTable([
            ['month', 'TotalPerMonth'],
              @foreach ($NumberOfConsultationPerMonth as $data)
              ['{{ $data->month }}', {{ $data->TotalPerMonth }}],
              @endforeach 
        ]);

        var options = {
          title : 'Number of patients for each month.',
          vAxis: {title: 'Patients'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {5: {type: 'line'}},
          chartArea: { left: '6%', top: '30%', width: '100%', height: '50%' }
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        console.log('show');
      }
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
                    <span class="FinalCountThisMonth">{{$ThisMonthTotal}}</span>
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
            <div class="HighestConsultationArea">
                <div class="HighestConsultationLabel1">
                    <span class="HighestConsultation">Current Highest</span>
                </div>  

                <div class="HighestConsultationValue">
                    <span class="HighestConsultation">
                        {{$CurrentHighestConsultation}}
                    </span>
                    <span class="HighestConsultationPercentage">
                        Patient: {{$CurrentHighestRecord}}  
                    </span>
                </div>

                <div class="HighestConsultationLabel2">  
                    @if($PreviousRecordofCurrentHighest === 0)
                    <span class="">
                       {{$PercentageCurrentLowest}}
                    </span>    
                    @elseif($CurrentHighestRecord > $PreviousRecordofCurrentHighest)
                    <span class="">
                        There is a {{number_format(abs($PercentageCurrentHighest),2)}}% 
                        <i class="fa-solid fa-up-long"></i>
                    </span> 
                    @elseif($CurrentHighestRecord < $PreviousRecordofCurrentHighest)
                    <span class="">
                        There is a {{number_format(abs($PercentageCurrentHighest),2)}}% 
                        <i class="fa-solid fa-down-long"></i>
                    </span> 
                    @else
                    <span class="">The number of patients is same compare to the past month.</span>
                    @endif
                </div>
            </div>{{-- Highest Consultation --}}

            {{-- Lowest Consultation --}}
            <div class="LowestConsultationArea">
                <div class="LowestConsultationLabel1">
                    <span class="LowestConsultation">Current Lowest</span>
                </div>
                <div class="LowestConsultationValue">
                    <span class="LowestConsultation">
                        {{$CurrentLowestConsulatation}}
                    </span>
                    <span class="LowestConsultationPercentage">
                        Patient: {{$CurrentLowestRecord}}
                    </span>
                </div>

                <div class="LowestConsultationLabel2">
                    @if($PreviousRecordofCurrentLowest === 0)
                    <span class="">
                       {{$PercentageCurrentLowest}}
                    </span>
                    @elseif($CurrentLowestRecord > $PreviousRecordofCurrentLowest)
                        <span class="">
                            There is an increase of {{ number_format(abs($PercentageCurrentLowest), 2) }}% 
                            <i class="fa-solid fa-up-long"></i>
                        </span>
                    @elseif($CurrentLowestRecord < $PreviousRecordofCurrentLowest)
                        <span class="">
                            There is a decrease of {{ number_format(abs($PercentageCurrentLowest), 2) }}% 
                            <i class="fa-solid fa-down-long"></i>
                        </span>
                    @else
                        <span class="">The number of patients is the same as the past month.</span>
                    @endif
                </div>
            </div>{{-- Lowest Consultation --}}            

        </div>{{-- First Area --}}
        {{-- Second Area --}}
        <div class="SecondArea">
            {{-- Table Of Consultation Area --}}
            <div class="TableOfConsultation">
                <table class="ConsultationTable">
                    <tr>
                        <th class="Consultation">Consultation</th>
                        <th class="TotalNumberPatient">Total Number of Patient</th>
                        <th class="Male">Male</th>
                        <th class="SeniorMale">Senior Male</th>
                        <th class="AdultMale">Adult Male</th>
                        <th class="TeenMale">Teen Male</th>
                        <th class="ChildMale">Child Male</th>
                        <th class="Female">Female</th>
                        <th class="SeniorFemale">Senior Female</th>
                        <th class="AdultFemale">Adult Female</th>
                        <th class="TeenFemale">Teen Female</th>
                        <th class="ChildFemale">Child Female</th>
                    </tr>
                   
                    <tr>
                        {{-- Consultation --}}
                        <td class="ConsultationVal">
                            @foreach($ConsultationDescending as $Desc)
                            <div class="ConsultationCountVal">
                                {{$Desc->Consultation}}
                            </div>
                            @endforeach
                        </td>
                      

                        {{-- Number of patient per consultation --}}
                        <td class="TotalNumberPatientVal">
                            @foreach($TotalPatientPerConsul as $TotalNumOfPatients)
                            <div class="TotalCountVal">
                                    {{$TotalNumOfPatients->NumPatient}}
                            </div>
                            @endforeach
                        </td>

                        {{-- Male --}}
                        <td class="MaleVal">
                            @foreach($TotalMaleCount as $Male)
                            <div class="AdultMaleCountVal">
                                    {{$Male->NumMale}}
                            </div>
                            @endforeach
                        </td>
                        <td class="SeniorMaleVal">
                            @foreach($SeniorMaleCountPerConsul as $SeniorMaleCount)
                            <div class="SeniorMaleCountVal">
                                    {{$SeniorMaleCount->MaleSenior}}
                            </div>
                            @endforeach
                        </td>
                        <td class="AdultMaleVal">
                            @foreach($AdultMaleCountPerConsul as $AdultMaleCount)
                            <div class="AdultMaleCountVal">
                                    {{$AdultMaleCount->MaleAdult}}
                            </div>
                            @endforeach
                        </td>
                        <td class="TeenMaleVal">
                            @foreach($TeenMaleCountPerConsul as $TeenMaleCount)
                            <div class="TeenMaleCountVal">
                                    {{$TeenMaleCount->MaleTeen}}
                            </div>
                            @endforeach
                        </td>
                        <td class="ChildMaleVal">
                            @foreach($ChildMaleCountPerConsul as $ChildMaleCount)
                            <div class="ChildMaleCountVal">
                                    {{$ChildMaleCount->MaleChild}}
                            </div>
                            @endforeach
                        </td>
                        {{-- Female --}}
                        <td class="FemaleVal">
                            @foreach($TotalFemaleCount as $Female)
                            <div class="AdultFemaleCountVal">
                                    {{$Female->NumFemale}}
                            </div>
                            @endforeach
                        </td>
                        <td class="SeniorFemaleVal">
                            @foreach($SeniorFemaleCountPerConsul as $SeniorFemaleCount)
                            <div class="SeniorFemaleCountVal">
                                    {{$SeniorFemaleCount->FemaleSenior}}
                            </div>
                            @endforeach
                        </td>
                        <td class="AdultFemaleVal">
                            @foreach($AdultFemaleCountPerConsul as $AdultFemaleCount)
                            <div class="AdultFemaleCountVal">
                                    {{$AdultFemaleCount->FemaleAdult}}
                            </div>
                            @endforeach
                        </td>
                        <td class="TeenFemaleVal">
                            @foreach($TeenFemaleCountPerConsul as $TeenFemaleCount)
                            <div class="TeenFemaleCountVal">
                                    {{$TeenFemaleCount->FemaleTeen}}
                            </div>
                            @endforeach
                        </td>
                        <td class="ChildFemaleVal">
                            @foreach($ChildFemaleCountPerConsul as $ChildFemaleCount)
                            <div class="ChildFemaleCountVal">
                                    {{$ChildFemaleCount->FemaleChild}}
                            </div>
                            @endforeach
                        </td>
                    </tr>
            
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
    </x-StaffNavigation>
@endif

    