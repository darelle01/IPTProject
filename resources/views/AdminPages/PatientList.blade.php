@if(Auth::check() && Auth::user()->Position === 'Admin')
    <x-AdminNavigation >
        {{-- CSS --}}
        <link rel="stylesheet" href="{{asset('AdminAccountCss/PatientFullList.css')}}">
        {{-- <link rel="stylesheet" href="{{asset('AdminAccountCss/PatientFullListTable.css')}}"> --}}
        {{-- Title --}}
        <x-slot:Title>
            Patient List
        </x-slot:Title>

        {{-- Patient Full List --}}
        <div class="PatientFullListTable bg-white us:w-11/12 us:mt-2 us:ml-2 us:h-fit us:max-h-[750px] x:max-w-[580px] x:h-fit md:max-w-xl lg:mx-auto lg:max-w-full">
            <div class="FormTitle bg-blue-500 us:h-fit us:w-full us:rounded-t-md us:m-0 us:p-1 x:flex x:h-[50px] md:flex md:h-[50px]">
                <span class=" text-white us:italic us:px-5 us:py-2 us:mx-auto us:font-semibold font-font-Arial us:text-lg x:text-3xl md:text-3xl md:my-auto">Patient List</span>
            </div>

            <form action="{{route('Admin.PatientListFilter')}}" method="GET" class="PatientListFilter us:flex us:flex-col us:justify-start us:bg-white border lg:grid lg:grid-cols-4 xl:justify-center">
                <div class="FilterName us:h-auto us:w-full us:my-2">
                    <span class="font-font-Arial font-semibold us:px-5 md:text-lg">Filter</span>
                </div>
                <div class="Filter x:flex x:flex-wrap x:mx-auto my-0 py-0 lg:col-span-3 lg:mx-auto">
                    <div class="FilterConsultationArea">
                        <select name="FilterConsultationValue" class="FilterConsultationValue us:w-[200px] us:h-fit us:p-1 us:mx-5 us:my-2 md:p-2">
                            <option value="">Select Consultation</option>
                            @if(isset($getAllConsultation) && count($getAllConsultation) > 0)
                                @foreach ($getAllConsultation as $AllConsultation)
                                    <option value="{{ $AllConsultation->ConsultationList }}">
                                        {{ $AllConsultation->ConsultationList }}
                                    </option>
                                @endforeach
                            @else
                                <option value="">No consultations found</option>
                            @endif
                        </select>
                    </div>
                    <div class="SortByArea">
                        <select name="SortByValue" class="SortByValue us:w-[150px] us:h-auto us:p-1 us:mx-5 us:my-2 md:p-2">
                            <option value="" selected>Sort by *</option>
                            <option value="PatientNumber" {{ request('SortByValue') == 'PatientNumber' ? 'selected' : '' }}>Patient Number</option>
                            <option value="Alphabetical" {{ request('SortByValue') == 'Alphabetical' ? 'selected' : '' }}>Alphabetical</option>
                            <option value="Age" {{ request('SortByValue') == 'Age' ? 'selected' : '' }}>Age</option>
                        </select>
                    </div>
                    <div class="FilterByGenderArea">
                        <select name="FilterByGender" class="FilterByGender us:w-[100px] us:h-auto us:p-1 us:mx-5 us:my-2 md:p-2">
                            <option value="" selected>Gender *</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="AgeBracketArea">
                        <select name="AgeBracket" class="AgeBracket us:w-[140px] us:h-auto us:p-1 us:mx-5 us:my-2 md:p-2">
                            <option value="" selected>Age Bracket *</option>
                            <option value="Senior" {{ request('AgeBracket') == 'Senior' ? 'selected' : '' }}>Senior</option>
                            <option value="Adult" {{ request('AgeBracket') == 'Adult' ? 'selected' : '' }}>Adult</option>
                            <option value="Teen" {{ request('AgeBracket') == 'Teen' ? 'selected' : '' }}>Teen</option>
                            <option value="Children" {{ request('AgeBracket') == 'Children' ? 'selected' : '' }}>Children</option>
                        </select>
                    </div>
                </div>

                <div class="ApplyBtnArea lg:w-fit">
                    <button type="submit" class="btn btn-info Apply  us:w-[150px] us:h-auto us:p-1 us:mx-5 us:my-2 x:p-2">Apply</button>
                </div>
            </form>{{-- Filter Area --}}

                {{-- Patient Full List Table --}}
                <form action="{{route('Admin.ViewMore')}}" method="GET"  class="PatientFullListTableArea us:w-full us:h-auto us:max-h-[400px] us:mt-2 overflow-y-auto">
                    @if($patients->isEmpty())
                        <p class="warn">No data found for the specified filters.</p>
                    @else
                    <table class="PatientTableGenerator text-center border table table-striped table-hover">
                    <tr>
                        <th class="PN">Patient Number</th>
                        <th class="LN">Last Name</th>
                        <th class="FN">First Name</th>
                        <th class="MN">Middle Name</th>
                        <th class="AgeVal">Age</th>
                        <th class="GenderVal">Gender</th>
                        <th class="PNo">Phone No.</th>
                        <th class="AddressVal">Address</th>
                        <th class="ActionVal">Action</th>
                    </tr>
                    
                    @foreach($patients as $patientRecord)
                    <tr>
                        <td name="PatientIdVal">{{$patientRecord->PatientID}}</td>
                        <td name="PatientIdVal">{{$patientRecord->LastName}}</td>
                        <td name="PatientIdVal">{{$patientRecord->FirstName}}</td>
                        <td name="PatientIdVal">{{$patientRecord->MiddleName}}</td>
                        <td name="PatientIdVal">{{$patientRecord->Age}}</td>
                        <td name="PatientIdVal">{{$patientRecord->Gender}}</td>
                        <td name="PatientIdVal">+63{{$patientRecord->ContactNumber}}</td>
                        <td name="PatientIdVal">
                            {{$patientRecord->HouseNumber}}, 
                            {{$patientRecord->Street}}, 
                            {{$patientRecord->Barangay}}, 
                            {{$patientRecord->Municipality}}, 
                            {{$patientRecord->Province}}
                        </td>
                        <td name="PatientIdVal">
                            <div class="ViewBtnform">
                                <button type="submit" name="View" value="{{$patientRecord->Stamp_Token}}" class="btn btn-info seemore">View</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </table>
                    @endif
                </form>{{-- Patient Full List Table --}}

        </div>{{-- Patient Full List --}}

</x-AdminNavigation>
@else
    <x-StaffNavigation>
        {{-- CSS --}}
        <link rel="stylesheet" href="{{asset('AdminAccountCss/PatientFullList.css')}}">
        {{-- <link rel="stylesheet" href="{{asset('AdminAccountCss/PatientFullListTable.css')}}"> --}}
        {{-- Title --}}
        <x-slot:Title>
            Patient List
        </x-slot:Title>

        {{-- Patient Full List --}}
        <div class="PatientFullListTable bg-white us:w-11/12 us:mt-2 us:ml-2 us:h-fit us:max-h-[750px] x:max-w-[580px] x:h-fit md:max-w-xl lg:mx-auto lg:max-w-full">
            <div class="FormTitle bg-blue-500 us:h-fit us:w-full us:rounded-t-md us:m-0 us:p-1 x:flex x:h-[50px] md:flex md:h-[50px]">
                <span class=" text-white us:italic us:px-5 us:py-2 us:font-semibold font-font-Arial us:text-lg x:text-3xl md:text-3xl md:my-auto">Patient List</span>
            </div>

            <form action="{{route('Admin.PatientListFilter')}}" method="GET" class="PatientListFilter us:flex us:flex-col us:justify-start us:bg-white border lg:grid lg:grid-cols-4 xl:justify-center">
                {{-- <div class="FilterName us:h-auto us:w-full us:my-2">
                    <span class="font-font-Arial font-semibold us:px-5 md:text-lg">Filter</span>
                </div> --}}
                <div class="Filter x:flex x:flex-wrap x:mx-auto my-0 py-0 lg:col-span-3 lg:mx-auto">
                    <div class="FilterConsultationArea">
                        <select name="FilterConsultationValue" class="FilterConsultationValue us:w-[200px] us:h-fit us:p-2 us:mx-5 us:my-2">
                            <option value="">Select Consultation</option>
                            @if(isset($getAllConsultation) && count($getAllConsultation) > 0)
                                @foreach ($getAllConsultation as $AllConsultation)
                                    <option value="{{ $AllConsultation->ConsultationList }}">
                                        {{ $AllConsultation->ConsultationList }}
                                    </option>
                                @endforeach
                            @else
                                <option value="">No consultations found</option>
                            @endif
                        </select>
                    </div>
                    <div class="SortByArea">
                        <select name="SortByValue" class="SortByValue us:w-[150px] us:h-auto us:p-2 us:mx-5 us:my-2">
                            <option value="" selected>Sort by *</option>
                            <option value="PatientNumber" {{ request('SortByValue') == 'PatientNumber' ? 'selected' : '' }}>Patient Number</option>
                            <option value="Alphabetical" {{ request('SortByValue') == 'Alphabetical' ? 'selected' : '' }}>Alphabetical</option>
                            <option value="Age" {{ request('SortByValue') == 'Age' ? 'selected' : '' }}>Age</option>
                        </select>
                    </div>
                    <div class="FilterByGenderArea">
                        <select name="FilterByGender" class="FilterByGender us:w-[100px] us:h-auto us:p-2 us:mx-5 us:my-2">
                            <option value="" selected>Gender *</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="AgeBracketArea">
                        <select name="AgeBracket" class="AgeBracket us:w-[140px] us:h-auto us:p-2 us:mx-5 us:my-2">
                            <option value="" selected>Age Bracket *</option>
                            <option value="Senior" {{ request('AgeBracket') == 'Senior' ? 'selected' : '' }}>Senior</option>
                            <option value="Adult" {{ request('AgeBracket') == 'Adult' ? 'selected' : '' }}>Adult</option>
                            <option value="Teen" {{ request('AgeBracket') == 'Teen' ? 'selected' : '' }}>Teen</option>
                            <option value="Children" {{ request('AgeBracket') == 'Children' ? 'selected' : '' }}>Children</option>
                        </select>
                    </div>
                </div>

                <div class="ApplyBtnArea lg:w-fit">
                    <button type="submit" class="btn btn-info Apply  us:w-[150px] us:h-auto us:p-1 us:mx-5 us:my-2 x:p-2">Apply</button>
                </div>
            </form>{{-- Filter Area --}}

                {{-- Patient Full List Table --}}
                <form action="{{route('Admin.ViewMore')}}" method="GET"  class="PatientFullListTableArea us:w-full us:h-auto us:max-h-[400px] us:mt-2 overflow-y-auto">
                    @if($patients->isEmpty())
                        <p class="warn">No data found for the specified filters.</p>
                    @else
                    <table class="PatientTableGenerator text-center border table table-striped table-hover">
                    <tr>
                        <th class="PN">Patient Number</th>
                        <th class="LN">Last Name</th>
                        <th class="FN">First Name</th>
                        <th class="MN">Middle Name</th>
                        <th class="AgeVal">Age</th>
                        <th class="GenderVal">Gender</th>
                        <th class="PNo">Phone No.</th>
                        <th class="AddressVal">Address</th>
                        <th class="ActionVal">Action</th>
                    </tr>
                    
                    @foreach($patients as $patientRecord)
                    <tr>
                        <td name="PatientIdVal">{{$patientRecord->PatientID}}</td>
                        <td name="PatientIdVal">{{$patientRecord->LastName}}</td>
                        <td name="PatientIdVal">{{$patientRecord->FirstName}}</td>
                        <td name="PatientIdVal">{{$patientRecord->MiddleName}}</td>
                        <td name="PatientIdVal">{{$patientRecord->Age}}</td>
                        <td name="PatientIdVal">{{$patientRecord->Gender}}</td>
                        <td name="PatientIdVal">+63{{$patientRecord->ContactNumber}}</td>
                        <td name="PatientIdVal">
                            {{$patientRecord->HouseNumber}}, 
                            {{$patientRecord->Street}}, 
                            {{$patientRecord->Barangay}}, 
                            {{$patientRecord->Municipality}}, 
                            {{$patientRecord->Province}}
                        </td>
                        <td name="PatientIdVal">
                            <div class="ViewBtnform">
                                <button type="submit" name="View" value="{{$patientRecord->Stamp_Token}}" class="btn btn-info seemore">View</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </table>
                    @endif
                </form>{{-- Patient Full List Table --}}

        </div>{{-- Patient Full List --}}
    </x-StaffNavigation>
@endif