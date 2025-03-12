<x-AdminNavigation>
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/UpdateAccount.css')}}">
    <x-slot:Title>
        Update Account
    </x-slot:Title>

    {{-- Update Account --}}
    <form action="{{route ('Updating.Staff')}}" method="POST" class="UpdateAccountForm bg-white us:max-w-fit us:mx-auto us:mt-3 us:max-h-[700px] xxs:max-w-[250px] xs:max-w-[300px] us:overflow-y-auto us:overflow-hidden us:rounded-md md:max-h-fit">
        @csrf
        @method('PUT')
        <div class="FormTitle us:bg-blue-500 us:w-full us:flex us:rounded-t-md">
            <label class="us:text-white us:font-semibold us:font-font-Arial us:italic us:text-xl us:mx-auto us:py-1 x:text-2xl x:py-1">Edit Staff Account</label>
        </div>
        {{-- Alert --}}
        @if (session('Success'))
        <div class="alert alert-success us:mx-auto max-w-[900px]">
            {{ session('Success') }}
        </div>
         @endif
    
        {{-- BasicInfoArea --}}
        <div class="BasicInfoArea">
            <div class="LableArea bg-blue-400 bg-opacity-55 us:flex">
                <label class=" us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Basic Information</label>
            </div>
            <div class="FullNameArea us:grid us:grid-cols-1 gap-1 us:my-1 us:mx-3 md:grid md:grid-cols-2 md:gap-3 lg:grid lg:grid-cols-3 lg:gap-3">
                <div class="LastNameArea">
                    <input type="text" name="LastName" value="{{$Account->LastName}}" class="LastName us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" placeholder="Last Name *">
                </div>
                <div class="FirstNameArea">
                    <input type="text" name="FirstName" value="{{$Account->FirstName}}" class="FirstName us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" placeholder="First Name *">
                </div>
                <div class="MiddleNameArea">
                    <input type="text" name="MiddleName"value="{{$Account->MiddleName}}" class="MiddleName us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" placeholder="Middle Name *">
                </div>
            </div>
            <div class="AgeGenderBirthdayArea us:grid us:grid-cols-1 gap-1 us:my-1 us:mx-3 md:grid md:grid-cols-2 md:gap-3 lg:grid lg:grid-cols-3 lg:gap-3">
                <div class="BirthdateArea">
                    <input type="date" id="MyBirthDate" name="Birthdate" value="{{$Account->Birthdate}}" class="Birthdate us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg">
                </div>
                <div class="AgeArea">
                    <input type="number" id="MyAge" name="Age" value="{{$Account->Age}}" class="Age us:max-w-[70px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:max-w-[90px] x:text-lg" placeholder="Age *">
                </div> 
                <div class="GenderArea">
                <select name="Gender" class="GenderValue us:w-[100px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:w-[130px]">
                    <option value="{{$Account->Gender}}">Gender *</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                </div>
            </div>
        </div> {{-- BasicInfoArea --}}

        {{-- ContactInfoArea --}}
        <div class="ContactInfoArea ">
            <div class="LableArea bg-blue-400 bg-opacity-55 us:flex">
                <label class=" us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Contact Information</label>
            </div>
            <div class="AddressArea1 us:grid us:grid-cols-1 gap-1 us:my-1 us:mx-3 md:grid md:grid-cols-2 md:gap-3 lg:grid lg:grid-cols-3 lg:gap-3">
                <div class="HouseNoArea">
                    <input type="text" name="HouseNumber" value="{{$Account->HouseNumber}}" class="HouseNo us:max-w-[100px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[150px]" placeholder="House No. *">
                </div>
                <div class="StreetArea">
                    <input type="text" name="Street" value="{{$Account->Street}}" class="Street us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:max-w-[240px] x:text-lg" placeholder="Street *">
                </div>
                <div class="BarangayArea">
                    <input type="text" name="Barangay" value="{{$Account->Barangay}}" class="Barangay us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:max-w-[240px] x:text-lg" placeholder="Barangay / Subdivision *">
                </div>
            </div>
            <div class="AddressArea2 us:grid us:grid-cols-1 gap-1 us:my-1 us:mx-3 md:grid md:grid-cols-2 md:gap-2">
                <div class="MunicipalityArea">
                    <input type="text" name="Municipality" value="{{$Account->Municipality}}" class="Municipality us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:max-w-[240px] x:text-lg" placeholder="Municipality / City *"> 
                </div>
                <div class="ProvinceArea">
                    <input type="text" name="Province" value="{{$Account->Province}}" class="Province us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:max-w-[240px] x:text-lg" placeholder="Province *">
                </div>
            </div>
            <div class="ContactArea us:grid us:grid-cols-1 gap-1 us:my-1 us:mx-3 md:grid md:grid-cols-2 md:gap-2">
                <div class=" us:w-fit x:w-[245px]">
                    <div class="us:border us:border-solid us:border-black us:flex us:flex-row us:items-center">
                      <span class="flag us:flex">
                          <img src="{{ asset('images/Ph-Flag.png') }}" alt="PH Flag" class="flagImage us:max-h-5 us:my-auto us:mx-1.5">
                      </span>                     
                      <span class="code us:my-auto us:mx-1 us:px-1.5 us:border-r us:border-solid x:text-lg us:border-black">
                          +63
                      </span>
                      <input type="tel" name="ContactNumber" id="MyNumber" minlength="13" maxlength="13" class="ContactNumber us:w-[129px] x:w-[170px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-1 x:text-lg us:border-none" placeholder="Contact Number *">
                  </div>
                </div>
                <div class="emailArea">
                    <input type="email" name="email" value="{{$Account->email}}" class="Email-Address us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:max-w-[240px] x:text-lg md:w-auto" placeholder="Email - Address ( if - any ) *">
                </div>
            </div>
        </div> {{-- ContactInfoArea --}}

        {{-- Account Area --}}
        <div class="AccountArea">
            <div class="LableArea bg-blue-400 bg-opacity-55 us:flex ">
                <label class="us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Account</label>
            </div>
            <div class="UsernameAndPasswordArea us:grid us:grid-cols-1 gap-1 us:my-1 us:mx-3 md:grid md:grid-cols-2 md:gap-3 lg:grid lg:grid-cols-3 lg:gap-3">
                
                <div class="UsernameArea">
                    <input type="text" name="username" value="" class="Username us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" placeholder="Username *">
                </div>
                
                <div class="OldUsernameArea">
                    <input type="text" name="OldUsername" value="{{$Account->username}}" class="Username" placeholder="Username *"  required hidden>
                </div>
                <div class="passwordArea us:flex us:flex-col">
                    <input type="password" name="password" class="password us:max-w-[180px] us:w-fit us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" required placeholder="Password *">
                    <span class=" us:text-xs">Use atleast 8 characters one upper, one lower,one number. </span>
                </div>
                
            </div>
        </div>{{-- Account Area --}}

        {{-- Button Area --}}
        <div class="BtnArea us:my-3 us:flex">
            <div class="  us:mx-auto">
                <button type="submit" name="EditStaffAccounts" class="save btn btn-info">Save</button>
            </div>
        </div>{{-- Button Area --}}
    </form>{{-- Update Account --}}
    <script src="{{asset('/javascript/AdminBtn/NewPatientPhoneNumber.js')}}"></script>
    <script src="{{asset('/javascript/AdminBtn/Age.js')}}"></script>

</x-AdminNavigation>            