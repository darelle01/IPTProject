<x-AdminNavigation>
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/UpdateAccount.css')}}">
    <x-slot:Title>
        Update Account
    </x-slot:Title>

    {{-- Update Account --}}
    <form action="{{route ('Updating.Staff')}}" method="POST" class="UpdateAccountForm">
        @csrf
        @method('PUT')
        <div class="FormTitle">
            <h1>Update Staff Account</h1>
        </div>
        {{-- Alert --}}
        @if (session('Success'))
        <div class="alert alert-success">
            {{ session('Success') }}
        </div>
        @endif
        {{-- BasicInfoArea --}}
        <div class="BasicInfoArea">
            <div class="LableArea">
                <h2>Basic Information</h2>
            </div>
            <div class="FullNameArea">
                <div class="LastNameArea">
                    <input type="text" name="LastName" value="{{$Account->LastName}}" class="LastName" placeholder="Last Name *">
                </div>
                <div class="FirstNameArea">
                    <input type="text" name="FirstName" value="{{$Account->FirstName}}" class="FirstName" placeholder="First Name *">
                </div>
                <div class="MiddleNameArea">
                    <input type="text" name="MiddleName"value="{{$Account->MiddleName}}" class="MiddleName" placeholder="Middle Name *">
                </div>
            </div>
            <div class="AgeGenderBirthdayArea">
                <div class="BirthdateArea">
                    <input type="date" name="Birthdate" value="{{$Account->Birthdate}}" class="Birthdate">
                </div>
                <div class="AgeArea">
                    <input type="number" name="Age" value="{{$Account->Age}}" class="Age" placeholder="Age *">
                </div> 
                <div class="GenderArea">
                <select name="Gender" class="GenderValue">
                    <option value="{{$Account->Gender}}">Gender *</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                </div>
            </div>
        </div> {{-- BasicInfoArea --}}

        {{-- ContactInfoArea --}}
        <div class="ContactInfoArea">
            <div class="LableArea">
                <h2>Contact Information</h2>
            </div>
            <div class="AddressArea1">
                <div class="HouseNoArea">
                    <input type="text" name="HouseNumber" value="{{$Account->HouseNumber}}" class="HouseNo" placeholder="House No. *">
                </div>
                <div class="StreetArea">
                    <input type="text" name="Street" value="{{$Account->Street}}" class="Street" placeholder="Street *">
                </div>
                <div class="BarangayArea">
                    <input type="text" name="Barangay" value="{{$Account->Barangay}}" class="Barangay" placeholder="Barangay / Subdivision *">
                </div>
            </div>
            <div class="AddressArea2">
                <div class="MunicipalityArea">
                    <input type="text" name="Municipality" value="{{$Account->Municipality}}" class="Municipality" placeholder="Municipality / City *"> 
                </div>
                <div class="ProvinceArea">
                    <input type="text" name="Province" value="{{$Account->Province}}" class="Province" placeholder="Province *">
                </div>
            </div>
            <div class="ContactArea">
                <div class="PhoneNoArea">
                    <span class="PhCode"></span>
                    <span class="Code">+63</span>
                    <input type="text" name="ContactNumber" value="{{$Account->ContactNumber}}" class="Contact" placeholder="Contact Number *">
                </div>
                <div class="emailArea">
                    <input type="email" name="email" value="{{$Account->email}}" class="Email-Address" placeholder="Email - Address ( if - any ) *">
                </div>
            </div>
        </div> {{-- ContactInfoArea --}}

        {{-- Account Area --}}
        <div class="AccountArea">
            <div class="LableArea">
                <h2>Account</h2>
            </div>
            <div class="UsernameAndPasswordArea">
                
                <div class="UsernameArea">
                    <input type="text" name="username" value="{{$Account->username}}" class="Username" placeholder="Username *">
                </div>
                
                <div class="OldUsernameArea">
                    <input type="text" name="OldUsername" value="{{$Account->username}}" class="Username" placeholder="Username *" hidden>
                </div>
                <div class="passwordArea">
                    <input type="password" name="password" class="password" placeholder="Password *">
                    <span class="direction">Use atleast 8 characters one upper, one lower,one number. </span>
                </div>
                
            </div>
        </div>{{-- Account Area --}}

        {{-- Button Area --}}
        <div class="BtnArea">
            <button type="submit" name="EditStaffAccounts" class="save btn btn-info">Save</button>
        </div>{{-- Button Area --}}
    </form>{{-- Update Account --}}

</x-AdminNavigation>            