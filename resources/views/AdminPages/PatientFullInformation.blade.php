@if(Auth::check() && Auth::user()->Position === 'Admin')
    <x-AdminNavigation >
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/AdminPatientFullInfo.css')}}">
    <link rel="stylesheet" href="{{asset('AdminAccountCss/AddPatientMedicalRecord.css')}}">
    <x-slot:Title>
        Add Patient Medical Logs
    </x-slot:Title>
    {{-- Patient Full Basic Information --}}
    <div class="PatientFullBasicInformation us:bg-white us:mt-3 us:mx-2 us:max-h-[450px] us:overflow-y-auto rounded-md xxs:mx-3 lg:max-h-[750px]">
        @csrf
        <div class="TitleArea us:bg-blue-500 us:w-full us:flex">
            <span class=" us:text-white us:font-semibold us:font-font-Arial us:italic us:text-xl us:mx-auto us:py-1 x:text-2xl x:py-1">Patient Information</span>
        </div>
       <div class="">
        {{-- Patient Number and Philhealth --}}
        <div class="PatientNumberandPhilhealthArea">
            <div class="PatientNumberandPhilhealthLabel md:grid md:grid-cols-2">
                <div class="">
                    <div class="PatientNumberArea">
                        <label class="PatientNumber us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Patient Number</label>
                    </div>
                    <div class="PatientNumberArea  us:w-full us:bg-blue-300">
                        <input type="text" class="PatientNumberValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1 us:border-none us:bg-transparent" name="PatientNumberValue" value="{{$patientsBasicInfo->PatientID}}" readonly>         
                    </div>
                </div>

                <div class="">
                <div class="PhilHealthArea">
                    <label class="PhilHealthNumber us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Philhealth</label>
                </div> 
                <div class="PhilHealthArea us:w-full us:bg-blue-300">
                    <label class="PhilHealthNumberValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->PhilhealthNumber}}</label>
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
                        <label class="LastNameLabel us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Last Name</label>
                    </div>
                    <div class="LastNameArea us:w-full us:bg-blue-300">
                        <label class="LastNameValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->LastName}}</label>
                    </div>
                </div>


                <div class="">
                    <div class="FirsttNameArea">
                        <label class="FirstNameLabel us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">First Name</label>
                    </div>
                    <div class="FirsttNameArea us:w-full us:bg-blue-300">
                        <label class="FirstNameValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->FirstName}}</label>
                    </div>
                </div>

                <div class="">
                    <div class="MiddleNameArea ">
                        <label class="MiddleNameLabel us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Middle Name</label>
                    </div>
                    <div class="MiddleNameArea us:w-full us:bg-blue-300">
                        <label class="MiddleNameValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->MiddleName}}</label>
                    </div>
                </div>
            </div>{{-- Full Name Label --}}
            
        </div>{{-- Basic Info Area --}}

        {{-- Birthdate, Age and Gender Label --}}
        <div class="BirthdateAgeGenderArea">
            <div class="BirthdateAgeGenderLabel md:grid md:grid-cols-3">
                <div class="">
                <div class="BirthdateArea">
                    <label class="BirthdateLabel us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Birthdate</label>
                </div>
                <div class="BirthdateArea us:w-full us:bg-blue-300">
                    <label class="BirthdateValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">
                        {{ \Carbon\Carbon::parse($patientsBasicInfo->Birthdate)->format('m-d-Y') }}
                    </label>
                </div>
                </div>
                <div class="">
                <div class="AgeArea">
                    <label class="AgeLabel us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Age</label>
                </div>
                <div class="AgeArea us:w-full us:bg-blue-300">
                    <label class="AgeValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->Age}}</label>
                </div>
                </div>
                <div class="">
                <div class="GenderArea">
                    <label class="GenderLabel us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Gender</label>
                </div>
                <div class="GenderArea us:w-full us:bg-blue-300">
                    <label class="GenderValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->Gender}}</label>
                </div>
                </div>
            </div>
        </div>{{-- Birthdate, Age and Gender Label --}}
    
        <div class="AddressContactArea">
            <div class="AddressContactLabel md:grid md:grid-cols-3">
                <div class="">
                <div class="HouseNoArea">
                    <label class="HouseNo us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">House No.</label>
                </div>
                <div class="HouseNoArea us:w-full us:bg-blue-300">
                    <label class="HouseNoValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->HouseNumber}}</label>
                </div>
                </div>
                <div class="">
                <div class="StreetArea">
                    <label class="Street us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Street</label>
                </div>
                <div class="StreetArea us:w-full us:bg-blue-300">
                    <label class="StreetValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->Street}}</label>
                </div>
                </div>
                <div class="">
                <div class="BarangayArea">
                    <label class="Barangay us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Barangay</label>
                </div>
                <div class="BarangayArea us:w-full us:bg-blue-300">
                    <label class="BarangayValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->Barangay}}</label>
                </div>
                </div>
                <div class="">
                <div class="MunicipalityArea">
                    <label class="Municipality us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Municipality</label>
                </div>
                <div class="MunicipalityArea us:w-full us:bg-blue-300">
                    <label class="MunicipalityValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->Municipality}}</label>
                </div>
                </div>
                <div class=" md:col-span-2">
                <div class="ProvinceArea">
                    <label class="Province us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Province</label>
                </div>
                <div class="ProvinceArea us:w-full us:bg-blue-300">
                    <label class="ProvinceValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->Province}}</label>
                </div>
                </div>
            </div>
        </div>{{-- Address Contact Label --}}

        {{-- Contact and Email --}}
        <div class="ContactAndEmailArea">
            <div class="ContactAndEmailLabel md:grid md:grid-cols-3">
                <div class="">
                <div class="ContactArea">
                    <label class="Conatact us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Contact</label>
                </div>
                <div class="ContactArea us:w-full us:bg-blue-300">
                    <label class="ConatactValue x:text-xl">
                        <i class="fa-solid fa-phone us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-2"></i>
                        +63{{$patientsBasicInfo->ContactNumber}}
                    </label>
                </div>
                </div>
                <div class=" md:col-span-2">
                <div class="EmailArea">
                    <label class="Email us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Email - Address</label>
                </div>
                <div class="EmailArea us:w-full us:bg-blue-300 us:my-1">
                    <label class="EmailValue x:text-xl">
                        <i class="fa-solid fa-envelope us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-2"></i>
                        {{$patientsBasicInfo->email}}
                    </label>
                </div>
                </div>
            </div>
        </div>{{-- Contact and Email --}}
        </div>
        <div class="ButtonArea us:w-full us:my-2 us:flex us:flex-row us:justify-center">
        <form action="{{route ('Generate.QrCode')}}" method="GET" class="">
            @csrf
            <button type="submit" name="Info" value="{{$patientsBasicInfo->PatientID}}" class="Qr-generator btn bg-info us:py-0 us:px-3 us:font-font-Arial us:w-[100px] us:mx-1 x:w-[200px] x:text-xl x:py-1">Generate QR Code</button>
        </form>
        <form action="{{route('Redirect.Update')}}" method="GET"  class="">
            <button type="submit" name="PatientNumberValue" value="{{$patientsBasicInfo->PatientID}}" class="update btn bg-info us:py-0 us:px-3 us:font-font-Arial us:w-fit us:mx-1 x:text-xl x:py-1">Update</button>
        </form>
        </div>
       
    </div>{{-- Patient Full Basic Information --}}
{{-- ------------------------------------------------------------------------------------------------------------ --}}

{{-- ------------------------------------------------------------------------------------------------------------ --}}

    {{-- Add Patient Medical Record --}}
    <div class="AddPatientMedicalRecordArea us:bg-white us:w-full us:max-w-[235px] us:mt-2 us:ml-2 xxs:max-w-[275px] xs:max-w-[325px] x:w-full x:max-w-[380px] md:max-w-none md:w-[480px]">
        <form action="{{route('Admin.SaveMedicalLogs')}}" method="POST" class="AddPatientMedicalRecord" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="FormTitle us:bg-blue-500 us:w-full us:flex us:rounded-t-md">
                <span class="us:text-white us:font-semibold us:font-font-Arial us:italic us:text-xl us:mx-auto us:py-1 x:text-2xl x:py-1">Add Patient Data</span>
            </div>
            <div class="SuccessAlert">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>
            {{-- Medical Logs Input Area --}}
            <div class="MedicalLogsInputArea ">
                
                {{-- Medical Logs Labels --}}
                <div class="MedicalLogsLabels us:w-full us:grid us:grid-flow-col us:overflow-hidden us:overflow-x-auto us:mt-1">

                    {{-- Patient Number Label Area --}}
                    <div class="PatientNoArea us:text-center">
                        <label class="PatientNo us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1 us:text-center">Patient Number</label>

                        {{-- Patient Number Input Area --}}
                        <div class="PatientNoInputArea">
                            <input type="text" name="PatientNumber" class="PatientNoValue us:text-center us:py-0 us:font-font-Arial us:border-none x:text-xl" value="{{$patientsBasicInfo->PatientID}}" readonly>
                        </div>{{-- Patient Number Input Area --}}

                        {{-- Patient Number Error Area --}}
                        <div class="PatientNumberError">
                            @error('PatientNumber')
                            <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>{{-- Patient Number Error Area --}}

                    </div>{{-- Patient Number Label Area --}}
                    
                    {{-- Consultation Area --}}
                    <div class="ConsultationArea  us:text-center">
                        <label class="Consultation us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1 us:text-center">Consultation</label>

                        {{-- Consultation Input Area --}}
                        <div class="ConsultationInputArea">
                            <select name="Consultation" class="ConsultationValue us:w-[200px] us:py-0 us:font-font-Arial us:mx-2 x:w-[225px] x:text-xl" required>
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
                        </div>{{-- Consultation Input Area --}}

                        {{-- Consultation Error Area --}}
                        <div class="ConsultationError">
                            @error('Consultation')
                            <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>{{-- Consultation Error Area --}}  

                    </div>{{-- Consultation Area --}}

                    {{-- Remarks Area --}}
                    <div class="RemarksArea us:text-center">
                        <label class="Remarks us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1 us:text-center">Remarks</label>

                        {{-- Remarks Input Area --}}
                        <div class="RemarksInputArea">
                            <textarea name="Remarks" rows="2" class="RemarksValue us:w-[200px] us:h-[100px] us:py-0 us:font-font-Arial us:mx-2 x:text-xl" style="resize: none;"></textarea>
                        </div>{{-- Remarks Input Area --}}

                        {{-- Remarks Error Area --}}
                        <div class="RemarksError">
                            @error('Remarks')
                            <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>{{-- Remarks Error Area --}}

                    </div>{{-- Remarks Area --}}

                    {{-- Date Of Check-up Area --}}
                    <div class="DateOfConsultationArea us:text-center">
                        <label class="DateOfConsultation us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1 us:text-center">Date Of Check-up</label>

                        {{-- Date Of Check-up Input Area --}}
                        <div class="DateOfConsultationInputArea">
                            <input type="date" name="DateOfConsultation" class="DateOfCheckUpValue us:w-auto us:py-0 us:font-font-Arial us:mx-2 x:text-xl" required>
                        </div>{{-- Date Of Check-up Input Area --}}
                        
                        {{-- Date Of Check-up Error Area --}}
                        <div class="DateOfCheckupError">
                            @error('DateOfConsultation')
                            <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>{{-- Date Of Check-up Error Area --}}

                    </div>{{-- Date Of Check-up Area --}}
                    
                    {{-- Date Of Upload Area --}}
                    <div class="DateOfUploadArea us:text-center">
                        <label class="DateOfUpload us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Date Of Upload</label>

                        {{-- Date Of Upload Input Area --}}
                        <div class="DateOfUploadInputArea">
                            <input type="date" name="DateOfUpload" class="DateOfUploadValue us:w-auto us:py-0 us:pl-5 us:font-font-Arial us:ml-10 us:border-none x:text-xl" value="{{ date('Y-m-d') }}" readonly>
                        </div>{{-- Date Of Upload Input Area --}}
                        
                        {{-- Date Of Upload Error Area --}}
                        <div class="DateOfUploadError">
                            @error('DateOfUpload')
                            <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>{{-- Date Of Upload Error Area --}}

                    </div>{{-- Date Of Upload Area --}}

                    {{-- Files Area --}}
                    <div class="FilesArea us:text-center">
                        <label class="Files us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Files</label>

                        {{-- File Input Area --}}
                        <div class="FileInputArea">
                            <input type="file" name="Files[]" multiple class="FileUploadValue us:w-auto us:py-0 us:font-font-Arial us:mx-2 us:border us:border-solid us:border-black x:text-xl" accept="image/*" placeholder="Upload Files here*">
                        </div>{{-- File Input Area --}}

                        {{-- Files Error Area --}}
                        <div class="FilesError">
                            @error('Files')
                            <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>{{-- Files Error Area --}}

                    </div>{{-- Files Area --}}  

                    {{-- Action Area --}}
                    <div class="ActionArea us:text-center us:w-[150px]">
                        <label class="Action us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Action</label>
                    
                    {{-- Action Slot Area --}}
                    <div class="ActionBtnArea">
                        <button type="submit" class="SaveBtn btn bg-info us:w-[100px] us:py-0 us:font-font-Arial us:mx-2 us:mt-3 x:text-xl">Save</button>
                    </div>{{-- Action Slot --}}
                    
                    </div>{{-- Action Area --}} 

                </div>{{-- Medical Logs Labels --}}

            </div>{{-- Medical Logs Input Area --}}
        </form>        
    </div>{{-- Add Patient Medical Record --}}
    <form action="{{route('Admin.ViewMedicalLogs')}}" method="GET" class="RedirectBtn us:mt-3 us:mx-auto">
        <input type="text" name="RedirectToPatientNo" value="{{ $patientsBasicInfo->PatientID }}" hidden>
        <button class="ViewMedicalLogs us:bg-green-300 us:font-semibold us:font-font-Arial us:italic us:text-xl us:p-3 us:rounded-full x:text-xl" >View Medical Logs</button>
    </form>
    
</x-AdminNavigation>













@else
<x-StaffNavigation>
            {{-- Css --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/AdminPatientFullInfo.css')}}">
    <link rel="stylesheet" href="{{asset('AdminAccountCss/AddPatientMedicalRecord.css')}}">
    <x-slot:Title>
        Add Patient Medical Logs
    </x-slot:Title>
    {{-- Patient Full Basic Information --}}
    <div class="PatientFullBasicInformation us:bg-white us:mt-3 us:mx-2 us:max-h-[450px] us:overflow-y-auto rounded-md xxs:mx-3 lg:max-h-[750px]">
        @csrf
        <div class="TitleArea us:bg-blue-500 us:w-full us:flex">
            <span class=" us:text-white us:font-semibold us:font-font-Arial us:italic us:text-xl us:mx-auto us:py-1 x:text-2xl x:py-1">Patient Information</span>
        </div>
       <div class="">
        {{-- Patient Number and Philhealth --}}
        <div class="PatientNumberandPhilhealthArea">
            <div class="PatientNumberandPhilhealthLabel md:grid md:grid-cols-2">
                <div class="">
                <div class="PatientNumberArea">
                    <label class="PatientNumber us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Patient Number</label>
                </div>
                <div class="PatientNumberArea  us:w-full us:bg-blue-300">
                    <input type="text" class="PatientNumberValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1 us:border-none us:bg-transparent" name="PatientNumberValue" value="{{$patientsBasicInfo->PatientID}}" readonly>         
                </div>
                </div>
                <div class="">
                <div class="PhilHealthArea">
                    <label class="PhilHealthNumber us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Philhealth</label>
                </div> 
                <div class="PhilHealthArea us:w-full us:bg-blue-300">
                    <label class="PhilHealthNumberValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->PhilhealthNumber}}</label>
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
                    <label class="LastNameLabel us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Last Name</label>
                </div>
                <div class="LastNameArea us:w-full us:bg-blue-300">
                    <label class="LastNameValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->LastName}}</label>
                </div>
                </div>
                <div class="">
                <div class="FirsttNameArea">
                    <label class="FirstNameLabel us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">First Name</label>
                </div>
                <div class="FirsttNameArea us:w-full us:bg-blue-300">
                    <label class="FirstNameValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->FirstName}}</label>
                </div>
                </div>
                <div class="">
                <div class="MiddleNameArea ">
                    <label class="MiddleNameLabel us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Middle Name</label>
                </div>
                <div class="MiddleNameArea us:w-full us:bg-blue-300">
                    <label class="MiddleNameValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->MiddleName}}</label>
                </div>
                </div>
            </div>{{-- Full Name Label --}}
            
        </div>{{-- Basic Info Area --}}

        {{-- Birthdate, Age and Gender Label --}}
        <div class="BirthdateAgeGenderArea">
            <div class="BirthdateAgeGenderLabel md:grid md:grid-cols-3">
                <div class="">
                <div class="BirthdateArea">
                    <label class="BirthdateLabel us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Birthdate</label>
                </div>
                <div class="BirthdateArea us:w-full us:bg-blue-300">
                    <label class="BirthdateValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">
                        {{ \Carbon\Carbon::parse($patientsBasicInfo->Birthdate)->format('m-d-Y') }}
                    </label>
                </div>
                </div>
                <div class="">
                <div class="AgeArea">
                    <label class="AgeLabel us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Age</label>
                </div>
                <div class="AgeArea us:w-full us:bg-blue-300">
                    <label class="AgeValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->Age}}</label>
                </div>
                </div>
                <div class="">
                <div class="GenderArea">
                    <label class="GenderLabel us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Gender</label>
                </div>
                <div class="GenderArea us:w-full us:bg-blue-300">
                    <label class="GenderValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->Gender}}</label>
                </div>
                </div>
            </div>
        </div>{{-- Birthdate, Age and Gender Label --}}
    
        <div class="AddressContactArea">
            <div class="AddressContactLabel md:grid md:grid-cols-3">
                <div class="">
                <div class="HouseNoArea">
                    <label class="HouseNo us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">House No.</label>
                </div>
                <div class="HouseNoArea us:w-full us:bg-blue-300">
                    <label class="HouseNoValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->HouseNumber}}</label>
                </div>
                </div>
                <div class="">
                <div class="StreetArea">
                    <label class="Street us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Street</label>
                </div>
                <div class="StreetArea us:w-full us:bg-blue-300">
                    <label class="StreetValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->Street}}</label>
                </div>
                </div>
                <div class="">
                <div class="BarangayArea">
                    <label class="Barangay us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Barangay</label>
                </div>
                <div class="BarangayArea us:w-full us:bg-blue-300">
                    <label class="BarangayValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->Barangay}}</label>
                </div>
                </div>
                <div class="">
                <div class="MunicipalityArea">
                    <label class="Municipality us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Municipality</label>
                </div>
                <div class="MunicipalityArea us:w-full us:bg-blue-300">
                    <label class="MunicipalityValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->Municipality}}</label>
                </div>
                </div>
                <div class=" md:col-span-2">
                <div class="ProvinceArea">
                    <label class="Province us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Province</label>
                </div>
                <div class="ProvinceArea us:w-full us:bg-blue-300">
                    <label class="ProvinceValue us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-1">{{$patientsBasicInfo->Province}}</label>
                </div>
                </div>
            </div>
        </div>{{-- Address Contact Label --}}

        {{-- Contact and Email --}}
        <div class="ContactAndEmailArea">
            <div class="ContactAndEmailLabel md:grid md:grid-cols-3">
                <div class="">
                <div class="ContactArea">
                    <label class="Conatact us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Contact</label>
                </div>
                <div class="ContactArea us:w-full us:bg-blue-300">
                    <label class="ConatactValue  x:text-xl">
                        <i class="fa-solid fa-phone us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-2"></i>
                        +63{{$patientsBasicInfo->ContactNumber}}
                    </label>
                </div>
                </div>
                <div class=" md:col-span-2">
                <div class="EmailArea">
                    <label class="Email us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Email - Address</label>
                </div>
                <div class="EmailArea us:w-full us:bg-blue-300">
                    <label class="EmailValue  x:text-xl">
                        <i class="fa-solid fa-envelope us:py-0 us:px-3 us:font-font-Arial x:text-xl x:py-2"></i>
                        {{$patientsBasicInfo->email}}
                    </label>
                </div>
                </div>
            </div>
        </div>{{-- Contact and Email --}}
        </div>
        <div class="ButtonArea us:w-full us:my-2 us:flex us:flex-row us:justify-center">
        <form action="{{route ('Generate.QrCode')}}" method="GET" class="">
            @csrf
            <button type="submit" name="Info" value="{{$patientsBasicInfo->PatientID}}" class="Qr-generator btn bg-info us:py-0 us:px-3 us:font-font-Arial us:w-[100px] us:mx-1 x:w-[200px] x:text-xl x:py-1">Generate QR Code</button>
        </form>
        <form action="{{route('Redirect.Update')}}" method="GET"  class="">
            <button type="submit" name="PatientNumberValue" value="{{$patientsBasicInfo->PatientID}}" class="update btn bg-info us:py-0 us:px-3 us:font-font-Arial us:w-fit us:mx-1 x:text-xl x:py-1">Update</button>
        </form>
        </div>
       
    </div>{{-- Patient Full Basic Information --}}
{{-- ------------------------------------------------------------------------------------------------------------ --}}

{{-- ------------------------------------------------------------------------------------------------------------ --}}

    {{-- Add Patient Medical Record --}}
    <div class="AddPatientMedicalRecordArea us:bg-white us:w-full us:max-w-[235px] us:mt-2 us:ml-2 xxs:max-w-[275px] xs:max-w-[325px] x:w-full x:max-w-[380px] md:max-w-none md:w-[480px]">
        <form action="{{route('Admin.SaveMedicalLogs')}}" method="POST" class="AddPatientMedicalRecord" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="FormTitle us:bg-blue-500 us:w-full us:flex us:rounded-t-md">
                <span class="us:text-white us:font-semibold us:font-font-Arial us:italic us:text-xl us:mx-auto us:py-1 x:text-2xl x:py-1">Add Patient Data</span>
            </div>
            <div class="SuccessAlert">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>
            {{-- Medical Logs Input Area --}}
            <div class="MedicalLogsInputArea ">
                
                {{-- Medical Logs Labels --}}
                <div class="MedicalLogsLabels us:w-full us:grid us:grid-flow-col us:overflow-hidden us:overflow-x-auto us:mt-1">

                    {{-- Patient Number Label Area --}}
                    <div class="PatientNoArea us:text-center">
                        <label class="PatientNo us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1 us:text-center">Patient Number</label>

                        {{-- Patient Number Input Area --}}
                        <div class="PatientNoInputArea">
                            <input type="text" name="PatientNumber" class="PatientNoValue us:text-center us:py-0 us:font-font-Arial us:border-none x:text-xl" value="{{$patientsBasicInfo->PatientID}}" readonly>
                        </div>{{-- Patient Number Input Area --}}

                        {{-- Patient Number Error Area --}}
                        <div class="PatientNumberError">
                            @error('PatientNumber')
                            <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>{{-- Patient Number Error Area --}}

                    </div>{{-- Patient Number Label Area --}}
                    
                    {{-- Consultation Area --}}
                    <div class="ConsultationArea  us:text-center">
                        <label class="Consultation us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1 us:text-center">Consultation</label>

                        {{-- Consultation Input Area --}}
                        <div class="ConsultationInputArea">
                            <select name="Consultation" class="ConsultationValue us:w-[200px] us:py-0 us:font-font-Arial us:mx-2 x:text-xl" required>
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
                        </div>{{-- Consultation Input Area --}}

                        {{-- Consultation Error Area --}}
                        <div class="ConsultationError">
                            @error('Consultation')
                            <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>{{-- Consultation Error Area --}}  

                    </div>{{-- Consultation Area --}}

                    {{-- Remarks Area --}}
                    <div class="RemarksArea us:text-center">
                        <label class="Remarks us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1 us:text-center">Remarks</label>

                        {{-- Remarks Input Area --}}
                        <div class="RemarksInputArea">
                            <textarea name="Remarks" rows="2" class="RemarksValue us:w-[200px] us:h-[100px] us:py-0 us:font-font-Arial us:mx-2 x:text-xl" style="resize: none;"></textarea>
                        </div>{{-- Remarks Input Area --}}

                        {{-- Remarks Error Area --}}
                        <div class="RemarksError">
                            @error('Remarks')
                            <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>{{-- Remarks Error Area --}}

                    </div>{{-- Remarks Area --}}

                    {{-- Date Of Check-up Area --}}
                    <div class="DateOfConsultationArea us:text-center">
                        <label class="DateOfConsultation us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1 us:text-center">Date Of Check-up</label>

                        {{-- Date Of Check-up Input Area --}}
                        <div class="DateOfConsultationInputArea">
                            <input type="date" name="DateOfConsultation" class="DateOfCheckUpValue us:w-auto us:py-0 us:font-font-Arial us:mx-2 x:text-xl" required>
                        </div>{{-- Date Of Check-up Input Area --}}
                        
                        {{-- Date Of Check-up Error Area --}}
                        <div class="DateOfCheckupError">
                            @error('DateOfConsultation')
                            <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>{{-- Date Of Check-up Error Area --}}

                    </div>{{-- Date Of Check-up Area --}}
                    
                    {{-- Date Of Upload Area --}}
                    <div class="DateOfUploadArea us:text-center">
                        <label class="DateOfUpload us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Date Of Upload</label>

                        {{-- Date Of Upload Input Area --}}
                        <div class="DateOfUploadInputArea">
                            <input type="date" name="DateOfUpload" class="DateOfUploadValue us:w-auto us:py-0 us:pl-5 us:font-font-Arial us:ml-10 us:border-none x:text-xl" value="{{ date('Y-m-d') }}" readonly>
                        </div>{{-- Date Of Upload Input Area --}}
                        
                        {{-- Date Of Upload Error Area --}}
                        <div class="DateOfUploadError">
                            @error('DateOfUpload')
                            <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>{{-- Date Of Upload Error Area --}}

                    </div>{{-- Date Of Upload Area --}}

                    {{-- Files Area --}}
                    <div class="FilesArea us:text-center">
                        <label class="Files us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Files</label>

                        {{-- File Input Area --}}
                        <div class="FileInputArea">
                            <input type="file" name="Files[]" multiple class="FileUploadValue us:w-auto us:py-0 us:font-font-Arial us:mx-2 us:border us:border-solid us:border-black x:text-xl" accept="image/*" placeholder="Upload Files here*">
                        </div>{{-- File Input Area --}}

                        {{-- Files Error Area --}}
                        <div class="FilesError">
                            @error('Files')
                            <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>{{-- Files Error Area --}}

                    </div>{{-- Files Area --}}  

                    {{-- Action Area --}}
                    <div class="ActionArea us:text-center us:w-[150px]">
                        <label class="Action us:font-semibold us:font-font-Arial us:px-3 us:text-sm x:text-xl x:py-1">Action</label>
                    
                    {{-- Action Slot Area --}}
                    <div class="ActionBtnArea">
                        <button type="submit" class="SaveBtn btn bg-info us:w-[100px] us:py-0 us:font-font-Arial us:mx-2 us:mt-3 x:text-xl">Save</button>
                    </div>{{-- Action Slot --}}
                    
                    </div>{{-- Action Area --}} 

                </div>{{-- Medical Logs Labels --}}

            </div>{{-- Medical Logs Input Area --}}
        </form>        
    </div>{{-- Add Patient Medical Record --}}
    <form action="{{route('Admin.ViewMedicalLogs')}}" method="GET" class="RedirectBtn us:mt-3 us:mx-auto">
        <input type="text" name="RedirectToPatientNo" value="{{ $patientsBasicInfo->PatientID }}" hidden>
        <button class="ViewMedicalLogs us:bg-green-300 us:font-semibold us:font-font-Arial us:italic us:text-xl us:p-3 us:rounded-full x:text-xl" >View Medical Logs</button>
    </form>
    </x-StaffNavigation>
@endif