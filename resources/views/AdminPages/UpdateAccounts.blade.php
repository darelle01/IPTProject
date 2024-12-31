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
            <h2>Update Staff Account</h2>
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
                <h1>Basic Information</h1>
            </div>
            <div class="FullNameArea">
                <input type="text" name="LastName" value="{{$Account->LastName}}" class="LastName" placeholder="Last Name *">
                <input type="text" name="FirstName" value="{{$Account->FirstName}}" class="FirstName" placeholder="First Name *">
                <input type="text" name="MiddleName"value="{{$Account->MiddleName}}" class="MiddleName" placeholder="Middle Name *">
            </div>
            <div class="AgeGenderBirthdayArea">
                <input type="number" name="Age" value="{{$Account->Age}}" class="Age" placeholder="Age *">
                <input type="date" name="Birthdate" value="{{$Account->Birthdate}}" class="Birthdate">
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
                <h1>Contact Information</h1>
            </div>
            <div class="AddressArea1">
                <input type="text" name="HouseNumber" value="{{$Account->HouseNumber}}" class="HouseNo" placeholder="House No. *">
                <input type="text" name="Street" value="{{$Account->Street}}" class="Street" placeholder="Street *">
                <input type="text" name="Barangay" value="{{$Account->Barangay}}" class="Barangay" placeholder="Barangay / Subdivision *">
            </div>
            <div class="AddressArea2">
                <input type="text" name="Municipality" value="{{$Account->Municipality}}" class="Municipality" placeholder="Municipality / City *">
                <input type="text" name="Province" value="{{$Account->Province}}" class="Province" placeholder="Province *">
            </div>

            <div class="ContactArea">
                <span class="PhCode"></span>
                <span class="Code">+63</span>
                <input type="text" name="ContactNumber" value="{{$Account->ContactNumber}}" class="Contact" placeholder="Contact Number *">
                <input type="email" name="email" value="{{$Account->email}}" class="Email-Address" placeholder="Email - Address ( if - any ) *">
            </div>
        </div> {{-- ContactInfoArea --}}

        {{-- Account Area --}}
        <div class="AccountArea">
            <div class="LableArea">
                <h1>Account</h1>
            </div>
            <div class="UsernameAndPasswordArea">
                <input type="text" name="username" value="{{$Account->username}}" class="Username" placeholder="Username *">
                <input type="text" name="OldUsername" value="{{$Account->username}}" class="Username" placeholder="Username *" hidden>
                <input type="password" name="password" class="password" placeholder="Password *">
            </div>
        </div>{{-- Account Area --}}

        {{-- Button Area --}}
        <div class="BtnArea">
            <button type="submit" name="EditStaffAccounts" class="save btn btn-info">Save</button>
        </div>{{-- Button Area --}}
    </form>{{-- Update Account --}}

</x-AdminNavigation>            