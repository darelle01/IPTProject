@if(Auth::check() && Auth::user()->Position === 'Admin')
    <x-AdminNavigation >
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/UpdatePatientBasicInfo.css')}}">
    <x-slot:Title>
        Update Patient Record
    </x-slot:Title>
    {{-- Patient Full Basic Information --}}
    <form action="{{route ('BasicInfo.Updated')}}" method="POST"  class="PatientFullBasicInformation us:bg-white us:mt-3 us:mx-2 us:max-h-[450px] us:overflow-y-auto rounded-md xxs:mx-3 x:max-h-[800px]">
    @csrf
    @method('PUT')

        <div class="TitleArea us:bg-blue-500 us:w-full us:flex">
            <span class=" us:text-white us:font-semibold us:font-font-Arial us:italic us:text-xl us:mx-auto us:py-1 x:text-2xl x:py-1">Edit Patient Information</span>
        </div>
        @foreach ($patientsBasicInfo as $patient)
        {{-- Patient Number and Philhealth --}}
        <div class="PatientNumberandPhilhealthArea">
            <div class="PatientNumberandPhilhealthLabel md:grid md:grid-cols-2">
                <div class="">
                    <div class="PatientNumberArea">
                        <label class="PatientNumber us:my-1 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Patient Number</label>
                    </div>
                    <div class="PatientNumberArea us:w-full us:bg-blue-300">
                        <input type="text" name="PatientID" class="PatientNumberValue us:my-1 us:w-[180px] us:ml-3 us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$DecryptedPatientNumberValue}}">
                    </div>
                </div>

                <div class="">
                    <div class="PhilHealthArea">
                        <label class="PhilHealthNumber us:my-1 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Philhealth Number</label>
                    </div> 
                    <div class="PhilHealthArea us:w-full us:bg-blue-300">
                        <input type="text" class="PhilHealthNumberValue us:my-1 us:w-[180px] us:ml-3 us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" name="PhilhealthNumber" value="{{$patient->PhilhealthNumber}}" placeholder="Philhealth Number *">
                    </div> 
                </div>
            </div>
        </div>{{-- Patient Number and Philhealth --}}

        {{-- Basic Info Area --}}
        <div class="BasicInfoArea">
            {{-- Full Name Label --}}
            <div class="FullNameLabel md:grid md:grid-cols-3">
                <div class="">
                    <div class="LastNameArea">
                        <label class="LastNameLabel us:my-1 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Last Name</label>
                    </div>
                    <div class="LastNameArea us:w-full us:bg-blue-300">
                        <input type="text" name="LastName" class="LastNameValue us:my-1 us:w-[180px] us:ml-3 us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$patient->LastName}}" placeholder="Last Name *">
                    </div>
                </div>
                <div class="">
                    <div class="FirsttNameArea">
                        <label class="FirstNameLabel us:my-1 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">First Name</label>
                    </div>
                    <div class="FirsttNameArea us:w-full us:bg-blue-300">
                        <input type="text" name="FirstName" class="FirstNameValue us:my-1 us:w-[180px] us:ml-3 us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$patient->FirstName}}" placeholder="First Name *">
                   </div>
                </div>
                <div class="">
                    <div class="MiddleNameArea">
                        <label class="MiddleNameLabel us:my-1 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Middle Name</label>
                    </div>
                    <div class="MiddleNameArea us:w-full us:bg-blue-300">
                        <input type="text" name="MiddleName" class="MiddleNameValue us:my-1 us:w-[180px] us:ml-3 us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$patient->MiddleName}}" placeholder="Middle Name *">
                    </div>
                </div>
                
            </div>{{-- Full Name Label --}}
        </div>{{-- Basic Info Area --}}

        {{-- Birthdate, Age and Gender Label --}}
        <div class="BirthdateAgeGenderArea">
            <div class="BirthdateAgeGenderLabel md:grid md:grid-cols-3">
                <div class="">
                    <div class="BirthdateArea">
                        <label class="BirthdateLabel us:my-1 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Birthdate</label>
                    </div>
                    <div class="BirthdateArea us:w-full us:bg-blue-300">
                        <input type="date" id="MyBirthDate" name="Birthdate" class="BirthdateValue us:my-1 us:ml-3 us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{ \Carbon\Carbon::parse($patient->Birthdate)->format('Y-m-d') }}">
                    </div>
                </div>
                <div class="">
                    <div class="AgeArea">
                        <label class="AgeLabel us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Age</label>
                    </div>
                    <div class="AgeArea us:w-full us:bg-blue-300">
                        <input type="number" id="MyAge" name="Age" class="AgeValue us:my-1 us:ml-3 us:w-[50px] x:w-[80px] us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$patient->Age}}" placeholder="Age *">
                    </div>
                </div>
                <div class="">
                    <div class="GenderArea">
                        <label class="GenderLabel us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Gender</label>
                    </div>
                    <div class="GenderArea us:w-full us:bg-blue-300">
                        <select name="Gender" class="GenderValue us:my-1 us:ml-3 us:w-[110px] x:w-[150px] us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">
                            <option value="{{$patient->Gender}}">Gender *</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>{{-- Birthdate, Age and Gender Label --}}  
           
        {{-- Address Contact Label--}}
        <div class="AddressContactArea">
            <div class="AddressContactLabel md:grid md:grid-cols-3">
                <div class="">
                    <div class="HouseNoArea">
                        <label class="HouseNo us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">House No.</label>
                    </div>
                    <div class="HouseNoArea us:w-full us:bg-blue-300">
                        <input type="text" name="HouseNumber" class="HouseNoValue us:my-1 us:ml-3 us:w-[80px] us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$patient->HouseNumber}}" placeholder="House No. *">
                    </div>
                </div>
                <div class="">
                    <div class="StreetArea">
                        <label class="Street us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Street</label>
                    </div>
                    <div class="StreetArea us:w-full us:bg-blue-300">
                        <input type="text" name="Street" class="StreetValue us:my-1 us:ml-3 us:w-[180px] us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1 x:w-[200px]" value="{{$patient->Street}}" placeholder="Street *">
                    </div>
                </div>
                <div class="">
                    <div class="BarangayArea">
                        <label class="Barangay us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Barangay</label>
                    </div>
                    <div class="BarangayArea us:w-full us:bg-blue-300">
                        <input type="text" name="Barangay" class="BarangayValue us:my-1 us:ml-3 us:w-[180px] us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1 x:w-[200px]" value="{{$patient->Barangay}}" placeholder="Barangay/Subd. *">
                    </div>
                </div>
                <div class="">
                    <div class="MunicipalityArea">
                        <label class="Municipality us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Municipality</label>
                    </div>
                    <div class="MunicipalityArea us:w-full us:bg-blue-300">
                        <input type="text" name="Municipality" class="MunicipalityValue us:my-1 us:ml-3 us:w-[180px] us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$patient->Municipality}}" placeholder="Municipality/City *">
                    </div>
                </div>
                <div class=" md:col-span-2">
                    <div class="ProvinceArea">
                        <label class="Province us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Province</label>
                    </div>
                    <div class="ProvinceArea us:w-full us:bg-blue-300">
                        <input type="text" name="Province" class="ProvinceValue us:my-1 us:ml-3 us:w-[180px] us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$patient->Province}}" placeholder="Province *">
                    </div>
                </div>

            </div>
        </div>{{-- Address Contact Label --}}
      
        {{-- Contact and Email --}}
        <div class="ContactAndEmailArea">
            <div class="ContactAndEmailLabel md:grid md:grid-cols-4">
                <div class="md:col-span-2">
                    <div class="ContactArea">
                        <label class="Conatact us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Contact</label>
                    </div>
                    <div class="us:w-full us:bg-blue-300 us:py-2 x:py-1 x:px-1">
                        <div class="ContactArea us:border us:border-solid us:border-black us:bg-white us:w-[180px] us:ml-3 us:h-7 us:flex us:flex-row us:items-center x:h-[38px] x:w-[240px]">
                        <span class="flag us:flex">
                            <img src="{{ asset('images/Ph-Flag.png') }}" alt="PH Flag" class="flagImage us:max-h-5 us:mx-1.5 x:max-h-7 x:m-1 x:pr-0 x:max-w-[20px] x:bg-gray-500">
                        </span>
                        <span class="Code us:my-auto us:mx-1 us:px-1.5 x:text-xl x:pb-1 us:border-r us:border-solid us:border-black x:max-w-fit x:pl-0">
                            +63
                        </span>
                        <input type="text" name="ContactNumber" id="MyNumber" minlength="13" maxlength="13" class="ContactValue us:border-none us:bg-transparent us:w-[119px] us:my-1 us:py-0 us:px-1 us:font-font-Arial x:text-xl x:py-1 x:px-1 x:w-[160px]" maxlength="10" minlength="10" placeholder="Mobile Number *" value="+63{{$patient->ContactNumber}}">
                    </div>
                    </div>
                </div>
                <div class=" md:col-span-2">
                    <div class="EmailArea">
                        <label class="Email us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Email - Address</label>
                    </div> 
                    <div class="EmailArea us:w-full us:bg-blue-300 us:py-1">
                        <input type="email" name="email" class="EmailValue us:w-[180px] us:ml-3 us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1 x:max-w-[230px] x:px-1" value="{{$patient->email}}" placeholder="Email - address *">
                    </div> 
                </div>
            </div>
        </div>{{-- Contact and Email --}}
        
        {{-- Contact and Email Value --}}
        <div class="ContactAndEmailArea">
            <div class="ContactAndEmailValue">
            </div>
        </div>{{-- Contact and Email Value --}}
        <div class="ButtonArea us:w-full us:my-2 us:flex us:flex-row us:justify-center">
            <button type="submit" class="update btn bg-info us:py-0 us:px-3 us:font-font-Arial us:w-fit us:mx-1 x:text-xl x:py-1">Save</button>
        </div>
        @endforeach
    </form>{{-- Patient Full Basic Information --}}
    <script src="{{asset('/javascript/AdminBtn/NewPatientPhoneNumber.js')}}"></script>
    <script src="{{asset('/javascript/AdminBtn/Age.js')}}"></script>
{{-- ------------------------------------------------------------------------------------------------------------ --}}

{{-- ------------------------------------------------------------------------------------------------------------ --}}

    
</x-AdminNavigation>
@else
    <x-StaffNavigation>
            {{-- Css --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/UpdatePatientBasicInfo.css')}}">
    <link rel="stylesheet" href="{{asset('AdminAccountCss/AddPatientMedicalRecord.css')}}">
    <x-slot:Title>
        Add Patient Medical Logs
    </x-slot:Title>
    {{-- Patient Full Basic Information --}}
    <form action="{{route ('BasicInfo.Updated')}}" method="POST"  class="PatientFullBasicInformation us:bg-white us:mt-3 us:mx-2 us:max-h-[450px] us:overflow-y-auto rounded-md xxs:mx-3 x:max-h-[800px]">
        @csrf
        @method('PUT')
    
            <div class="TitleArea us:bg-blue-500 us:w-full us:flex">
                <span class=" us:text-white us:font-semibold us:font-font-Arial us:italic us:text-xl us:mx-auto us:py-1 x:text-2xl x:py-1">Edit Patient Information</span>
            </div>
            @foreach ($patientsBasicInfo as $patient)
            {{-- Patient Number and Philhealth --}}
            <div class="PatientNumberandPhilhealthArea">
                <div class="PatientNumberandPhilhealthLabel md:grid md:grid-cols-2">
                    <div class="">
                        <div class="PatientNumberArea">
                            <label class="PatientNumber us:my-1 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Patient Number</label>
                        </div>
                        <div class="PatientNumberArea us:w-full us:bg-blue-300">
                            <input type="text" name="PatientID" class="PatientNumberValue us:my-1 us:w-[180px] us:ml-3 us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$DecryptedPatientNumberValue}}">
                        </div>
                    </div>
    
                    <div class="">
                        <div class="PhilHealthArea">
                            <label class="PhilHealthNumber us:my-1 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Philhealth Number</label>
                        </div> 
                        <div class="PhilHealthArea us:w-full us:bg-blue-300">
                            <input type="text" class="PhilHealthNumberValue us:my-1 us:w-[180px] us:ml-3 us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" name="PhilhealthNumber" value="{{$patient->PhilhealthNumber}}" placeholder="Philhealth Number *">
                        </div> 
                    </div>
                </div>
            </div>{{-- Patient Number and Philhealth --}}
    
            {{-- Basic Info Area --}}
            <div class="BasicInfoArea">
                {{-- Full Name Label --}}
                <div class="FullNameLabel md:grid md:grid-cols-3">
                    <div class="">
                        <div class="LastNameArea">
                            <label class="LastNameLabel us:my-1 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Last Name</label>
                        </div>
                        <div class="LastNameArea us:w-full us:bg-blue-300">
                            <input type="text" name="LastName" class="LastNameValue us:my-1 us:w-[180px] us:ml-3 us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$patient->LastName}}" placeholder="Last Name *">
                        </div>
                    </div>
                    <div class="">
                        <div class="FirsttNameArea">
                            <label class="FirstNameLabel us:my-1 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">First Name</label>
                        </div>
                        <div class="FirsttNameArea us:w-full us:bg-blue-300">
                            <input type="text" name="FirstName" class="FirstNameValue us:my-1 us:w-[180px] us:ml-3 us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$patient->FirstName}}" placeholder="First Name *">
                       </div>
                    </div>
                    <div class="">
                        <div class="MiddleNameArea">
                            <label class="MiddleNameLabel us:my-1 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Middle Name</label>
                        </div>
                        <div class="MiddleNameArea us:w-full us:bg-blue-300">
                            <input type="text" name="MiddleName" class="MiddleNameValue us:my-1 us:w-[180px] us:ml-3 us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$patient->MiddleName}}" placeholder="Middle Name *">
                        </div>
                    </div>
                    
                </div>{{-- Full Name Label --}}
            </div>{{-- Basic Info Area --}}
    
            {{-- Birthdate, Age and Gender Label --}}
            <div class="BirthdateAgeGenderArea">
                <div class="BirthdateAgeGenderLabel md:grid md:grid-cols-3">
                    <div class="">
                        <div class="BirthdateArea">
                            <label class="BirthdateLabel us:my-1 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Birthdate</label>
                        </div>
                        <div class="BirthdateArea us:w-full us:bg-blue-300">
                            <input type="date" id="MyBirthDate" name="Birthdate" class="BirthdateValue us:my-1 us:ml-3 us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{ \Carbon\Carbon::parse($patient->Birthdate)->format('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="">
                        <div class="AgeArea">
                            <label class="AgeLabel us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Age</label>
                        </div>
                        <div class="AgeArea us:w-full us:bg-blue-300">
                            <input type="number" id="MyAge" name="Age" class="AgeValue us:my-1 us:ml-3 us:w-[50px] x:w-[80px] us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$patient->Age}}" placeholder="Age *">
                        </div>
                    </div>
                    <div class="">
                        <div class="GenderArea">
                            <label class="GenderLabel us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Gender</label>
                        </div>
                        <div class="GenderArea us:w-full us:bg-blue-300">
                            <select name="Gender" class="GenderValue us:my-1 us:ml-3 us:w-[110px] x:w-[150px] us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">
                                <option value="{{$patient->Gender}}">Gender *</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>{{-- Birthdate, Age and Gender Label --}}  
               
            {{-- Address Contact Label--}}
            <div class="AddressContactArea">
                <div class="AddressContactLabel md:grid md:grid-cols-3">
                    <div class="">
                        <div class="HouseNoArea">
                            <label class="HouseNo us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">House No.</label>
                        </div>
                        <div class="HouseNoArea us:w-full us:bg-blue-300">
                            <input type="text" name="HouseNumber" class="HouseNoValue us:my-1 us:ml-3 us:w-[80px] us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$patient->HouseNumber}}" placeholder="House No. *">
                        </div>
                    </div>
                    <div class="">
                        <div class="StreetArea">
                            <label class="Street us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Street</label>
                        </div>
                        <div class="StreetArea us:w-full us:bg-blue-300">
                            <input type="text" name="Street" class="StreetValue us:my-1 us:ml-3 us:w-[180px] us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1 x:w-[200px]" value="{{$patient->Street}}" placeholder="Street *">
                        </div>
                    </div>
                    <div class="">
                        <div class="BarangayArea">
                            <label class="Barangay us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Barangay</label>
                        </div>
                        <div class="BarangayArea us:w-full us:bg-blue-300">
                            <input type="text" name="Barangay" class="BarangayValue us:my-1 us:ml-3 us:w-[180px] us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1 x:w-[200px]" value="{{$patient->Barangay}}" placeholder="Barangay/Subd. *">
                        </div>
                    </div>
                    <div class="">
                        <div class="MunicipalityArea">
                            <label class="Municipality us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Municipality</label>
                        </div>
                        <div class="MunicipalityArea us:w-full us:bg-blue-300">
                            <input type="text" name="Municipality" class="MunicipalityValue us:my-1 us:ml-3 us:w-[180px] us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$patient->Municipality}}" placeholder="Municipality/City *">
                        </div>
                    </div>
                    <div class=" md:col-span-2">
                        <div class="ProvinceArea">
                            <label class="Province us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Province</label>
                        </div>
                        <div class="ProvinceArea us:w-full us:bg-blue-300">
                            <input type="text" name="Province" class="ProvinceValue us:my-1 us:ml-3 us:w-[180px] us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1" value="{{$patient->Province}}" placeholder="Province *">
                        </div>
                    </div>
    
                </div>
            </div>{{-- Address Contact Label --}}
          
            {{-- Contact and Email --}}
            <div class="ContactAndEmailArea">
                <div class="ContactAndEmailLabel md:grid md:grid-cols-4">
                    <div class="md:col-span-2">
                        <div class="ContactArea">
                            <label class="Conatact us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Contact</label>
                        </div>
                        <div class="us:w-full us:bg-blue-300 us:py-2 x:py-1 x:px-1">
                            <div class="ContactArea us:border us:border-solid us:border-black us:bg-white us:w-[180px] us:ml-3 us:h-7 us:flex us:flex-row us:items-center x:h-[38px] x:w-[240px]">
                            <span class="flag us:flex">
                                <img src="{{ asset('images/Ph-Flag.png') }}" alt="PH Flag" class="flagImage us:max-h-5 us:mx-1.5 x:max-h-7 x:m-1 x:pr-0 x:max-w-[20px] x:bg-gray-500">
                            </span>
                            <span class="Code us:my-auto us:mx-1 us:px-1.5 x:text-xl x:pb-1 us:border-r us:border-solid us:border-black x:max-w-fit x:pl-0">
                                +63
                            </span>
                            <input type="text" name="ContactNumber" id="MyNumber" minlength="13" maxlength="13" class="ContactValue us:border-none us:bg-transparent us:w-[119px] us:my-1 us:py-0 us:px-1 us:font-font-Arial x:text-xl x:py-1 x:px-1 x:w-[160px]" maxlength="10" minlength="10" placeholder="Mobile Number *" value="+63{{$patient->ContactNumber}}">
                        </div>
                        </div>
                    </div>
                    <div class=" md:col-span-2">
                        <div class="EmailArea">
                            <label class="Email us:my-1 us:ml-3 us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Email - Address</label>
                        </div> 
                        <div class="EmailArea us:w-full us:bg-blue-300 us:py-1">
                            <input type="email" name="email" class="EmailValue us:w-[180px] us:ml-3 us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1 x:max-w-[230px] x:px-1" value="{{$patient->email}}" placeholder="Email - address *">
                        </div> 
                    </div>
                </div>
            </div>{{-- Contact and Email --}}
            
            {{-- Contact and Email Value --}}
            <div class="ContactAndEmailArea">
                <div class="ContactAndEmailValue">
                </div>
            </div>{{-- Contact and Email Value --}}
            <div class="ButtonArea us:w-full us:my-2 us:flex us:flex-row us:justify-center">
                <button type="submit" class="update btn bg-info us:py-0 us:px-3 us:font-font-Arial us:w-fit us:mx-1 x:text-xl x:py-1">Save</button>
            </div>
            @endforeach
        </form>{{-- Patient Full Basic Information --}}
        <script src="{{asset('/javascript/AdminBtn/NewPatientPhoneNumber.js')}}"></script>
        <script src="{{asset('/javascript/AdminBtn/Age.js')}}"></script>
{{-- ------------------------------------------------------------------------------------------------------------ --}}

    </x-StaffNavigation>
@endif