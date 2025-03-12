@if(Auth::check() && Auth::user()->Position === 'Admin')
    <x-AdminNavigation >
    {{-- Css  --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/AdminNewPatient.css')}}">
    <x-slot:Title>
        New Patient
    </x-slot:Title>
    <form action="{{route('Admin.Save')}}" method="POST" class="NewPatientForm us:bg-white us:ml-3 us:mt-5 us:overflow-y-auto us:overflow-hidden us:max-h-[700px] us:rounded-md xxs:max-w-[250px]">
        @csrf
        <div class="FormNameArea us:bg-blue-500 us:flex us:rounded-t-md">
            <label class=" us:text-white us:mx-auto us:py-2 us:text-xl us:font-semibold us:font-font-Arial us:italic">New Patient</label>
        </div>
        @if (session('Update'))
        <div class="alert alert-success">
            {{ session('Update') }}
        </div>
        @endif
        {{-- Patient Number and Philhealth --}}
        <div class="PatientNumberPhilhealthArea">
            <div class="PatientNumberPhilhealthLabel us:bg-blue-300 us:w-full us:flex">
                <label class="us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Patient Number and Philhealth</label>
            </div>
        </div>{{-- Patient Number and Philhealth --}}

        {{-- Patient Number and Philhealth Area --}}
        <div class="PhilHealthAndPatientNumberArea us:grid us:grid-cols-1 us:pl-1 us:gap-1 us:m-1 md:grid md:grid-cols-2 md:gap-2">
            {{-- Patient Number Area --}}
            <div class="PatientIDArea">
                <input type="text" name="PatientID" class="PatientID us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[200px]" placeholder="Patient ID *">
                <div class="PatientIDerrorArea">
                    @error('PatientID')
                    <div class="PatientID-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Patient Number Area --}}
            {{-- Philhealth Area --}}
            <div class="PhilhealthNumberInputArea">
                <input type="text" name="PhilhealthNumber" class="PhilhealthNumber us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[200px]" placeholder="Philhealth Number *">   
                <div class="PhilhealthNumberErrorArea">
                    @error('PhilhealthNumber')
                    <div class="PhilhealthNumber-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>     
            </div>{{-- Philhealth Area --}} 
        </div>

        {{-- Basic Information Label --}}
        <div class="BasicInfoArea">
            <div class="BasicInfoLabel us:bg-blue-300 us:w-full us:flex">
                <label class="us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Basic Information</label>
            </div>
        </div>{{-- Basic Information Label --}}


        {{-- Basic Information Input 1 --}}
        <div class="BasicInfoInputArea us:grid us:grid-cols-1 us:pl-1 us:gap-1 us:m-1 md:grid md:grid-cols-3 md:gap-2">

            {{-- Last Name --}}
            <div class="LastNameArea">
                <div class="LastNameInputArea">
                    <input type="text" name="LastName" class="LastName us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" placeholder="Last Name *">
                </div>
                <div class="LastNameErrorArea">
                    @error('LastName')
                    <div class="LastName-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Last Name --}}

            {{-- First Name --}}
            <div class="FirstNameArea">
                <div class="FirstNameInputArea">
                    <input type="text" name="FirstName" class="FirstName us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" placeholder="First Name *">
                </div>
                <div class="FirstNameErrorArea">
                    @error('FirstName')
                    <div class="FirstName-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- First Name --}} 

            {{-- Middle Name --}}
            <div class="MiddleNameArea">
                <div class="MiddleNameInputArea">
                    <input type="text" name="MiddleName" class="MiddleName us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" placeholder="Middle Name *">
                </div>
                <div class="MiddleNameErrorArea">
                    @error('MiddleName')
                    <div class="MiddleName-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Middle Name --}}  

        </div>{{-- Basic Information Input 1 --}}

        {{-- Basic Information Input 2 --}}
        <div class="BasicInfoInputArea2  us:grid us:grid-cols-1 us:pl-1 us:gap-1 us:m-1 md:grid md:grid-cols-3 md:gap-2">

            {{-- Birthdate --}}
            <div class="BirthdateArea">
                <div class="BirthdateInput">
                    <input type="date" id="MyBirthDate" name="Birthdate" class="Birthdate us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg">
                </div>
                <div class="BirthdateErrorArea">
                    @error('Birthdate')
                    <div class="Birthdate-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Birthdate --}}

            {{-- Age --}}
            <div class="AgeArea">
                <div class="AgeInputArea">
                    <input type="number" id="MyAge" name="Age" class="Age us:max-w-[70px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:max-w-[90px] x:text-lg" min="1" placeholder="Age *">
                </div>
                <div class="AgeErrorArea">
                    @error('Age')
                    <div class="Age-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Age --}}
            {{-- Gender --}}
            <div class="GenderArea">
                <div class="GenderInputArea">
                    <select name="Gender" class="Gender us:w-[100px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:w-[130px]" required>
                        <option value="" disabled selected>Gender *</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                
                <div class="GenderErrorArea">
                    @error('Gender')
                    <div class="Gender-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Age --}}            

        </div>{{-- Basic Information Input 2 --}}

{{-- ------------------------------------------------------------------------------------- --}}
        {{-- Address and Contacts --}}
        <div class="AddressAndContactArea">
            <div class="AddressAndContactLabel us:bg-blue-300 us:w-full us:flex">
                <label class="us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Address and Contacts</label>
            </div>
        </div>{{-- Address and Contacts --}}

        {{-- Address And Contact Input Area --}}
        <div class="AddressAndContactInputArea us:grid us:grid-cols-1 us:pl-1 us:gap-1 us:m-1 md:grid md:grid-cols-2 md:gap-2 lg:grid lg:grid-cols-3 lg:gap-2">
        {{-- House Number --}}
        <div class="HouseNumberArea">
            <div class="HouseNumberInputArea">
                <input type="text" name="HouseNumber" class="HouseNumber us:max-w-[110px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[130px]" placeholder="House No. *">
            </div>
            <div class="HouseNumberErrorArea">
                @error('HouseNumber')
                <div class="HouseNumber-error us:text-red-500 us:text-sm">{{$message }}</div>
                @enderror
            </div>
        </div>{{-- House Number --}}

        {{-- Street --}}
        <div class="StreetArea">
             <div class="StreetInputArea">
                <input type="text" name="Street" class="Street us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[220px]" placeholder="Street *">
            </div>
            <div class="StreetErrorArea">
                @error('Street')
                <div class="Street-error us:text-red-500 us:text-sm">{{$message }}</div>
                @enderror
            </div>
        </div>{{-- Street --}}

        {{-- Barangay --}}
        <div class="BarangayArea">
            <div class="BarangayInputArea">
               <input type="text" name="Barangay" class="Barangay us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[220px]" placeholder="Barangay / Subdivison*">
           </div>
           <div class="BarangayErrorArea">
               @error('Barangay')
               <div class="Barangay-error us:text-red-500 us:text-sm">{{$message }}</div>
               @enderror
           </div>
       </div>{{-- Barangay --}}
        </div>{{-- Address And Contact Input Area --}}
{{-- --------------------------------------------------------------------------------- --}}
        {{-- Address And Contact Input Area 2 --}}
        <div class="AddressAndContactInputArea2 us:grid us:grid-cols-1 us:pl-1 us:gap-1 us:m-1 md:grid md:grid-cols-2 md:gap-2">
            {{-- Municipality --}}
            <div class="MunicipalityArea">
                <div class="MunicipalityInputArea">
                    <input type="text" name="Municipality" class="Municipality us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[220px]" placeholder="Municipality / City*">
                </div>
                <div class="MunicipalityErrorArea">
                    @error('Municipality')
                    <div class="Municipality-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Municipality --}}
    
            {{-- Province --}}
            <div class="ProvinceArea">
                 <div class="ProvinceInputArea">
                    <input type="text" name="Province" class="Province us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[220px]" placeholder="Province *">
                </div>
                <div class="ProvinceErrorArea">
                    @error('Province')
                    <div class="Province-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Province --}}
    
            </div>{{-- Address And Contact Input Area 2 --}}       
 
{{-- ------------------------------------------------------------------------------------ --}}
        {{-- Address And Contact Input Area 3 --}}
        <div class="AddressAndContactInputArea3 us:grid us:grid-cols-1 us:pl-1 us:gap-1 us:m-1 md:grid md:grid-cols-2 md:gap-2">
            {{-- Contact --}}
            <div class="ContactNumberArea">
                <div class=" us:w-fit x:w-[245px]">
                    <div class="us:border us:border-solid us:border-black us:flex us:flex-row us:items-center">
                      <span class="flag us:flex">
                          <img src="{{ asset('images/Ph-Flag.png') }}" alt="PH Flag" class="flagImage us:max-h-5 us:my-auto us:mx-1">
                      </span>                     
                      <span class="code us:text-sm us:my-auto us:mx-1 us:px-1 us:border-r us:border-solid x:text-lg us:border-black">
                          +63
                      </span>
                      <input type="tel" name="ContactNumber" id="MyNumber" minlength="13" maxlength="13" class="ContactNumber us:w-[133px] x:w-[170px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-1 x:text-lg us:border-none" placeholder="Contact Number *">
                    </div>
                </div>    
                <div class="ContactNumberErrorArea">
                    @error('ContactNumber')
                    <div class="ContactNumber-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Contact --}}
    
            {{-- email --}}
            <div class="emailArea">
                 <div class="emailInputArea">
                    <input type="email" name="email" class="email us:max-w-[200px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[240px]" placeholder="Email - Address ( if - any) *">
                </div>
                <div class="emailErrorArea">
                    @error('email')
                    <div class="email-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- email --}}
        </div>{{-- Address And Contact Input Area 3 --}}  
{{-- ------------------------------------------------------------------------------------- --}}

        
        {{-- Save Btn --}}
        <div class="SaveBtnArea us:w-full us:my-3 us:flex">
            <button type="submit" class="Save btn btn-info us:mx-auto">Save</button>
        </div>{{-- Save Btn --}}
    </form>

    <script src="{{asset('/javascript/AdminBtn/NewPatientPhoneNumber.js')}}"></script>
    <script src="{{asset('/javascript/AdminBtn/Age.js')}}"></script>
</x-AdminNavigation>
@else
    <x-StaffNavigation>
        {{-- Css  --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/AdminNewPatient.css')}}">
    <x-slot:Title>
        New Patient
    </x-slot:Title>
    <form action="{{route('Admin.Save')}}" method="POST" class="NewPatientForm us:bg-white us:ml-3 us:mt-2 us:overflow-y-auto us:overflow-hidden us:max-h-[700px] us:rounded-md xxs:max-w-[250px]">
        @csrf
        <div class="FormNameArea us:bg-blue-500 us:flex us:rounded-t-md">
            <label class=" us:text-white us:mx-auto us:py-2 us:text-xl us:font-semibold us:font-font-Arial us:italic">New Patient</label>
        </div>
        @if (session('Update'))
        <div class="alert alert-success">
            {{ session('Update') }}
        </div>
        @endif
        {{-- Patient Number and Philhealth --}}
        <div class="PatientNumberPhilhealthArea">
            <div class="PatientNumberPhilhealthLabel us:bg-blue-300 us:w-full us:flex">
                <label class="us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Patient Number and Philhealth</label>
            </div>
        </div>{{-- Patient Number and Philhealth --}}

        {{-- Patient Number and Philhealth Area --}}
        <div class="PhilHealthAndPatientNumberArea us:grid us:grid-cols-1 us:gap-1 us:m-1 md:grid md:grid-cols-2 md:gap-2">
            {{-- Patient Number Area --}}
            <div class="PatientIDArea">
                <input type="text" name="PatientID" class="PatientID us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[200px]" placeholder="Patient ID *">
                <div class="PatientIDerrorArea">
                    @error('PatientID')
                    <div class="PatientID-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Patient Number Area --}}
            {{-- Philhealth Area --}}
            <div class="PhilhealthNumberInputArea">
                <input type="text" name="PhilhealthNumber" class="PhilhealthNumber us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[200px]" placeholder="Philhealth Number *">   
                <div class="PhilhealthNumberErrorArea">
                    @error('PhilhealthNumber')
                    <div class="PhilhealthNumber-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>     
            </div>{{-- Philhealth Area --}} 
        </div>

        {{-- Basic Information Label --}}
        <div class="BasicInfoArea">
            <div class="BasicInfoLabel us:bg-blue-300 us:w-full us:flex">
                <label class="us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Basic Information</label>
            </div>
        </div>{{-- Basic Information Label --}}


        {{-- Basic Information Input 1 --}}
        <div class="BasicInfoInputArea us:grid us:grid-cols-1 us:gap-1 us:m-1 md:grid md:grid-cols-3 md:gap-2">

            {{-- Last Name --}}
            <div class="LastNameArea">
                <div class="LastNameInputArea">
                    <input type="text" name="LastName" class="LastName us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" placeholder="Last Name *">
                </div>
                <div class="LastNameErrorArea">
                    @error('LastName')
                    <div class="LastName-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Last Name --}}

            {{-- First Name --}}
            <div class="FirstNameArea">
                <div class="FirstNameInputArea">
                    <input type="text" name="FirstName" class="FirstName us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" placeholder="First Name *">
                </div>
                <div class="FirstNameErrorArea">
                    @error('FirstName')
                    <div class="FirstName-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- First Name --}} 

            {{-- Middle Name --}}
            <div class="MiddleNameArea">
                <div class="MiddleNameInputArea">
                    <input type="text" name="MiddleName" class="MiddleName us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" placeholder="Middle Name *">
                </div>
                <div class="MiddleNameErrorArea">
                    @error('MiddleName')
                    <div class="MiddleName-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Middle Name --}}  

        </div>{{-- Basic Information Input 1 --}}

        {{-- Basic Information Input 2 --}}
        <div class="BasicInfoInputArea2  us:grid us:grid-cols-1 us:gap-1 us:m-1 md:grid md:grid-cols-3 md:gap-2">

            {{-- Birthdate --}}
            <div class="BirthdateArea">
                <div class="BirthdateInput">
                    <input type="date" id="MyBirthDate" name="Birthdate" class="Birthdate us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg">
                </div>
                <div class="BirthdateErrorArea">
                    @error('Birthdate')
                    <div class="Birthdate-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Birthdate --}}

            {{-- Age --}}
            <div class="AgeArea">
                <div class="AgeInputArea">
                    <input type="number" id="MyAge" name="Age" class="Age us:max-w-[70px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:max-w-[90px] x:text-lg" min="1" placeholder="Age *">
                </div>
                <div class="AgeErrorArea">
                    @error('Age')
                    <div class="Age-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Age --}}
            {{-- Gender --}}
            <div class="GenderArea">
                <div class="GenderInputArea">
                    <select name="Gender" class="Gender us:w-[100px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:w-[130px]" required>
                        <option value="" disabled selected>Gender *</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                
                <div class="GenderErrorArea">
                    @error('Gender')
                    <div class="Gender-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Age --}}            

        </div>{{-- Basic Information Input 2 --}}

{{-- ------------------------------------------------------------------------------------- --}}
        {{-- Address and Contacts --}}
        <div class="AddressAndContactArea">
            <div class="AddressAndContactLabel us:bg-blue-300 us:w-full us:flex">
                <label class="us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Address and Contacts</label>
            </div>
        </div>{{-- Address and Contacts --}}

        {{-- Address And Contact Input Area --}}
        <div class="AddressAndContactInputArea us:grid us:grid-cols-1 us:gap-1 us:m-1 md:grid md:grid-cols-2 md:gap-2 lg:grid lg:grid-cols-3 lg:gap-2">
        {{-- House Number --}}
        <div class="HouseNumberArea">
            <div class="HouseNumberInputArea">
                <input type="text" name="HouseNumber" class="HouseNumber us:max-w-[110px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[130px]" placeholder="House No. *">
            </div>
            <div class="HouseNumberErrorArea">
                @error('HouseNumber')
                <div class="HouseNumber-error us:text-red-500 us:text-sm">{{$message }}</div>
                @enderror
            </div>
        </div>{{-- House Number --}}

        {{-- Street --}}
        <div class="StreetArea">
             <div class="StreetInputArea">
                <input type="text" name="Street" class="Street us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[220px]" placeholder="Street *">
            </div>
            <div class="StreetErrorArea">
                @error('Street')
                <div class="Street-error us:text-red-500 us:text-sm">{{$message }}</div>
                @enderror
            </div>
        </div>{{-- Street --}}

        {{-- Barangay --}}
        <div class="BarangayArea">
            <div class="BarangayInputArea">
               <input type="text" name="Barangay" class="Barangay us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[220px]" placeholder="Barangay / Subdivison*">
           </div>
           <div class="BarangayErrorArea">
               @error('Barangay')
               <div class="Barangay-error us:text-red-500 us:text-sm">{{$message }}</div>
               @enderror
           </div>
       </div>{{-- Barangay --}}
        </div>{{-- Address And Contact Input Area --}}
{{-- --------------------------------------------------------------------------------- --}}
        {{-- Address And Contact Input Area 2 --}}
        <div class="AddressAndContactInputArea2 us:grid us:grid-cols-1 us:gap-1 us:m-1 md:grid md:grid-cols-2 md:gap-2">
            {{-- Municipality --}}
            <div class="MunicipalityArea">
                <div class="MunicipalityInputArea">
                    <input type="text" name="Municipality" class="Municipality us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[220px]" placeholder="Municipality / City*">
                </div>
                <div class="MunicipalityErrorArea">
                    @error('Municipality')
                    <div class="Municipality-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Municipality --}}
    
            {{-- Province --}}
            <div class="ProvinceArea">
                 <div class="ProvinceInputArea">
                    <input type="text" name="Province" class="Province us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[220px]" placeholder="Province *">
                </div>
                <div class="ProvinceErrorArea">
                    @error('Province')
                    <div class="Province-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Province --}}
    
            </div>{{-- Address And Contact Input Area 2 --}}       
 
{{-- ------------------------------------------------------------------------------------ --}}
        {{-- Address And Contact Input Area 3 --}}
        <div class="AddressAndContactInputArea3 us:grid us:grid-cols-1 us:gap-1 us:m-1 md:grid md:grid-cols-2 md:gap-2">
            {{-- Contact --}}
            <div class="ContactNumberArea">
                <div class=" us:w-fit x:w-[245px]">
                    <div class="us:border us:border-solid us:border-black us:flex us:flex-row us:items-center">
                      <span class="flag us:flex">
                          <img src="{{ asset('images/Ph-Flag.png') }}" alt="PH Flag" class="flagImage us:max-h-5 us:my-auto us:mx-1">
                      </span>                     
                      <span class="code us:my-auto us:mx-1 us:px-2 us:border-r us:border-solid x:text-lg us:border-black">
                          +63
                      </span>
                      <input type="tel" name="ContactNumber" id="MyNumber" minlength="13" maxlength="13" class="ContactNumber us:w-[134px] x:w-[170px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-1 x:text-lg us:border-none" placeholder="Contact Number *">
                    </div>
                </div>    
                <div class="ContactNumberErrorArea">
                    @error('ContactNumber')
                    <div class="ContactNumber-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- Contact --}}
    
            {{-- email --}}
            <div class="emailArea">
                 <div class="emailInputArea">
                    <input type="email" name="email" class="email us:max-w-[200px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[240px]" placeholder="Email - Address ( if - any) *">
                </div>
                <div class="emailErrorArea">
                    @error('email')
                    <div class="email-error us:text-red-500 us:text-sm">{{$message }}</div>
                    @enderror
                </div>
            </div>{{-- email --}}
        </div>{{-- Address And Contact Input Area 3 --}}  
{{-- ------------------------------------------------------------------------------------- --}}

        
        {{-- Save Btn --}}
        <div class="SaveBtnArea us:w-full us:my-3 us:flex">
            <button type="submit" class="Save btn btn-info us:mx-auto">Save</button>
        </div>{{-- Save Btn --}}
    </form>

    <script src="{{asset('/javascript/AdminBtn/NewPatientPhoneNumber.js')}}"></script>
    <script src="{{asset('/javascript/AdminBtn/Age.js')}}"></script>
    </x-StaffNavigation>
@endif