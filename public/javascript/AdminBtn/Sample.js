document.addEventListener('DOMContentLoaded', function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function fetchDashboardData() {
        fetch('/RHU-Dashboard-Fetch', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Unable to fetch data from the database' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
           
            // Total number of Patient for the current month
            const Total = document.getElementById('Total');
            const TotalCount = data.TotalForThisMonth;
            Total.innerText = TotalCount;

            // Pie Chart                      
            const pieChartDataArray = [['Consultation', 'NumPatient']];
            data.Pie.forEach(Value => {
                pieChartDataArray.push([Value.Consultation, Value.NumPatient]);
            });
            const pieChartData = google.visualization.arrayToDataTable(pieChartDataArray);
     
            const options = {
                is3D: true,
                backgroundColor: { fill: 'transparent' },
                legend: 'none',
                pieStartAngle: 90,
                chartArea: { left: '5%', top: '0', width: '90%', height: '80%' },
                titleTextStyle: { color: 'black', fontName: 'Arial', fontSize: 18, italic: true, bold: true }
            };

            const chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(pieChartData, options);

            // Display Highest Consultation and its Number of Patients
            const HighestConsultationArea = document.getElementById('HighestConsultationArea');
            HighestConsultationArea.innerHTML = '';

            if (data.HighestConsul && data.HighestConsul.length > 0 && data.HighestConsul[0].Consultation && data.HighestConsultationValue && data.HighestConsultationValue !== 0) {
                HighestConsultationArea.insertAdjacentHTML('beforeend', `
                    <div class="HighestConsultationLabel1">
                        <span class="HighestConsultation">Current Highest</span>
                    </div>  
    
                    <div class="HighestConsultationValue">
                        <span class="HighestConsultation">
                            ${data.HighestConsul[0].Consultation}
                        </span>
                        <span class="HighestConsultationPercentage">
                            Patients: ${data.HighestConsultationValue}        
                        </span>
                    </div>
                `);
            } else {
                HighestConsultationArea.insertAdjacentHTML('beforeend', `
                    <div class="HighestConsultationLabel1">
                        <span class="HighestConsultation">Current Highest</span>
                    </div>  
    
                    <div class="HighestConsultationValue">
                        <span class="HighestConsultation">
                            No Data
                        </span>
                        <span class="HighestConsultationPercentage">
                            Patients: 0  
                        </span>
                    </div>
                `);
            }

            // Compare Current Highest To Past Record
            // console.log(data.HighestConsultationValue);  
            if (data.PrevDataOfCurrentHighestData === 0) {
                HighestConsultationArea.insertAdjacentHTML('beforeend', `
               <div class="HighestConsultationLabel2" id="CurrentHighest">  
                    <span class="">
                      No Data
                    </span>    
                </div>
                `);
            }
            else if (data.PrevDataOfCurrentHighestData < data.HighestConsultationValue) {
            HighestConsultationArea.insertAdjacentHTML('beforeend', `
            <div class="HighestConsultationLabel2" id="CurrentHighest">  
                <span class="">
                   There is an increase in case
                   ${Number(Math.abs(data.HighConsulDiff)).toFixed(0)}%
                </span>    
            </div>
             `);
            } 
            else if (data.PrevDataOfCurrentHighestData > data.HighestConsultationValue) {
            HighestConsultationArea.insertAdjacentHTML('beforeend', `
            <div class="HighestConsultationLabel2" id="CurrentHighest">  
                <span class="">
                    There is decrease in case
                     ${Number(Math.abs(data.HighConsulDiff)).toFixed(0)}%
                </span>    
            </div>
            `);
            } 
            else if (data.PrevDataOfCurrentHighestData === data.HighestConsultationValue) {
            HighestConsultationArea.insertAdjacentHTML('beforeend', `
            <div class="HighestConsultationLabel2" id="CurrentHighest">  
                 <span class="">
                   There is no increase or decrease in cases.
                 </span>    
            </div>
            `);
            }
            else if (data.HighestConsultationValue === 0) {
            HighestConsultationArea.insertAdjacentHTML('beforeend', `
            <div class="HighestConsultationLabel2" id="CurrentHighest">  
                <span class="">
                    No Data
                </span>    
            </div>
            `);
            }
        
            // Display Lowest Consultation and its Number of Patients
            const LowestConsultationArea = document.getElementById('LowestConsultationArea');
            LowestConsultationArea.innerHTML = '';
            // console.log(data.LowestConsultationValue);
            if (data.LowestConsul && data.LowestConsul.length > 0 && data.LowestConsul[0].Consultation && data.LowestConsultationValue && data.LowestConsultationValue !== 0) {
                LowestConsultationArea.insertAdjacentHTML('beforeend', `
                    <div class="LowestConsultationLabel1">
                        <span class="LowestConsultation">Current Lowest</span>
                    </div>  
    
                    <div class="LowestConsultationValue">
                        <span class="LowestConsultation">
                            ${data.LowestConsul[0].Consultation}
                        </span>
                        <span class="LowestConsultationPercentage">
                            Patients: ${data.LowestConsultationValue}        
                        </span>
                    </div>
                `);
            } else {
                LowestConsultationArea.insertAdjacentHTML('beforeend', `
                    <div class="LowestConsultationLabel1">
                        <span class="LowestConsultation">Current Lowest</span>
                    </div>  
    
                    <div class="LowestConsultationValue">
                        <span class="LowestConsultation">
                            No Data
                        </span>
                        <span class="LowestConsultationPercentage">
                            Patients: 0
                        </span>
                    </div>
                `);
            }
            // Compare Current Lowest To Past Record
            // console.log(data.PrevDataOfCurrentLowestData);  
            if (data.PrevDataOfCurrentLowestData === 0) {
                LowestConsultationArea.insertAdjacentHTML('beforeend', `
               <div class="LowestConsultationLabel2" id="CurrentLowest">  
                    <span class="">
                      No Data
                    </span>    
                </div>
                `);
            }
            else if (data.PrevDataOfCurrentLowestData < data.LowestConsultationValue) {
                LowestConsultationArea.insertAdjacentHTML('beforeend', `
            <div class="LowestConsultationLabel2" id="CurrentLowest">  
                <span class="">
                   There is an increase in case
                   ${Number(Math.abs(data.LowConsulDiff)).toFixed(0)}%
                </span>    
            </div>
             `);
            } 
            else if (data.PrevDataOfCurrentLowestData > data.LowestConsultationValue) {
            LowestConsultationArea.insertAdjacentHTML('beforeend', `
            <div class="LowestConsultationLabel2" id="CurrentLowest">  
                <span class="">
                    There is decrease in case
                     ${Number(Math.abs(data.LowConsulDiff)).toFixed(0)}%
                </span>    
            </div>
            `);
            } 
            else if (data.PrevDataOfCurrentLowestData === data.LowestConsultationValue) {
            LowestConsultationArea.insertAdjacentHTML('beforeend', `
            <div class="LowestConsultationLabel2" id="CurrentLowest">  
                 <span class="">
                   There is no increase or decrease in cases.
                 </span>    
            </div>
            `);
            }
            else if (data.LowestConsultationValue === 0) {
            LowestConsultationArea.insertAdjacentHTML('beforeend', `
            <div class="LowestConsultationLabel2" id="CurrentLowest">  
                <span class="">
                    No Data
                </span>    
            </div>
            `);
            }

        // Table Area Label
        const BreakDownLabel = document.getElementById('BreakDownLabel');
        BreakDownLabel.innerHTML = '';
            var row = `
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
            `;
        BreakDownLabel.innerHTML = row;
        // Table Area Value
        // console.log(data)
        const BreakDown = document.getElementById('BreakDown');
        BreakDown.innerHTML = '';
            data.Data.forEach(function(List){
                var row = `
                <tr>
                <td class="ConsultationVal"
                    <div class="ConsultationCountVal">
                        ${List.Consultation}
                    </div>
                </td>
                <td class="TotalNumberPatientVal">
                    <div class="TotalCountVal">
                        ${List.NumPatient}
                    </div>
                </td> 



                <td class="MaleVal">
                    <div class="Male">
                        ${List.NumMale}
                    </div>
                </td>   
                <td class="SeniorMaleVal">
                    <div class="SeniorMaleCountVal">
                        ${List.NumSeniorMale}
                    </div>
                </td>
                <td class="AdultMaleVal">
                    <div class="AdultMaleCountVal">
                        ${List.NumAdultMale}
                    </div>
                </td>                
                <td class="TeenMaleVal">
                    <div class="TeenMaleCountVal">
                        ${List.NumTeenMale}
                    </div>
                </td>
                <td class="ChildMaleVal">
                    <div class="ChildMaleCountVal">
                        ${List.NumChildMale}
                    </div>
                </td>

                


                <td class="FemaleVal">
                    <div class="Female">
                        ${List.NumFemale}
                    </div>
                </td>
                <td class="SeniorFemaleVal">
                    <div class="SeniorFemaleCountVal">
                        ${List.NumSeniorFemale}
                    </div>
                </td>
                <td class="AdultFemaleVal">
                    <div class="AdultFemaleCountVal">
                        ${List.NumAdultFemale}
                    </div>
                </td>
                <td class="TeenFemaleVal">
                    <div class="TeenFemaleCountVal">
                        ${List.NumTeenFemale}
                    </div>
                </td>
                <td class="ChildFemaleVal">
                    <div class="ChildFemaleCountVal">
                        ${List.NumChildFemale}
                    </div>
                </td>
                `;
                BreakDown.innerHTML += row;
        
        
            // Google Chart  
            console.log(data.CurrentYearData);
            const ChartColumn = [['Month', 'NumPatient']];
            data.CurrentYearData.forEach(Value => {
                ChartColumn.push([Value.Month, Value.NumPatient]);
            });
            const ChartColumnData = google.visualization.arrayToDataTable(ChartColumn);
            var options = {
                title : 'Number of patients for each month.',
                vAxis: {title: 'Patients'},
                hAxis: {title: 'Month'},
                seriesType: 'bars',
                series: {5: {type: 'line'}},
                chartArea: { left: '6%', top: '30%', width: '100%', height: '50%' }
              };
      
              var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
              chart.draw(ChartColumnData, options);
            });
    })
        .catch(error => console.error(error));
    }
             
    // Initial fetch
    fetchDashboardData();

    // Fetch data every 30 seconds
    setInterval(fetchDashboardData, 10000);
});
