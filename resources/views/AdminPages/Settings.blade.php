@if(Auth::check() && Auth::user()->Position === 'Admin')
    <x-AdminNavigation >
    {{-- Css  --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/Settings.css')}}">
    <x-slot:Title>
        Settings
    </x-slot:Title>
    
        {{-- Setting Area --}}
        <div class="SettingsProfileArea us:bg-white us:mt-3 us:ml-3 us:h-fit us:max-h-[900px] md:h-[780px]">

            {{-- Settings Title --}}
            <div class="SettingsTitle us:bg-blue-500 us:w-full us:flex us:rounded-t-md">
                <label class=" us:text-white us:font-semibold us:font-font-Arial us:italic us:text-xl us:mx-auto us:py-1 x:text-2xl x:py-1">
                    Settings
                </label>
            </div>{{-- Settings Title --}}
    
            <div class="">
                    {{-- Profile Picture --}}
                    <div class="ProfilePicArea us:flex us:mt-3 md:grid md:grid-cols-3 md:ml-10">

                        <div class="ProfilePictureArea us:rounded-full us:w-[200px] us:h-[200px] us:overflow-hidden us:border-black us:border-4 us:mx-auto us:p-1">
                            @if (Auth::user()->profile_picture)
                            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="" class=" profilepicture us:w-full us:h-full us:object-cover us:rounded-full">
                            @else
                            <img src="{{ asset('images/DefaultImage.webp') }}" alt="" class=" profilepicture1 bg-white us:rounded-full us:w-fit us:h-fit">
                            @endif
                        </div>
                        <div class="ProfilePicBtns">
                            
                        </div>
                    </div>{{-- Profile Picture --}}
            </div>
            <div class=" us:overflow-y-auto us:overflow-hidden us:h-full us:max-h-[340px] us:my-2 md:max-h-fit">
                {{-- Info Area --}}
                <div class="ProfileSettingsTitle us:flex us:my-3 us:border-b-4 us:border-black us:mx-6">
                    <label class=" us:font-semibold us:font-font-Arial us:text-xl us:mx-auto x:text-2xl"> 
                        Basic Info
                    </label>
                </div>
                <div class="InfoArea us:flex us:flex-col us:my-3 us:mx-5 md:grid md:grid-cols-3">
                        <div class="">
                            <label class="LastNameLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Last Name:</label>
                            <label class="LastName us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->LastName}}</label>  
                        </div>
                        <div class="">
                            <label class="FirstNameLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">First Name:</label>
                            <label class="FirstName us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->FirstName}}</label>
                        </div>
                        <div class="">
                            <label class="MiddleNameLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Middle Name:</label>
                            <label class="MiddleName us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->MiddleName}}</label>
                        </div>
                        <div class="">
                            <label class="BirthdateLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Birthdate:</label>
                            <label class="Birthdate us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->Birthdate}}</label>
                        </div>
                        <div class="">
                            
                            <label class="AgeLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Age:</label>
                            <label class="Age us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->Age}}</label>
                        </div>
                        <div class="">
                            <label class="GenderLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Gender:</label>
                            <label class="Gender us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->Gender}}</label>
                        </div>
                </div> {{-- Info Area --}}

                {{-- Contact Info Area--}}
                <div class="ContactInfoArea us:flex us:flex-col us:my-3 us:mx-5">
                    <div class="ContactInfoTitle us:flex us:my-3 us:border-b-4 us:border-black us:mx-2">
                        <label class=" us:font-semibold us:font-font-Arial us:text-xl us:mx-auto x:text-2xl">
                            Contact Info
                        </label>
                    </div>
                    <div class="ContactsArea">
                        <div class="">
                            <label class="AddressLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Address:</label>
                            <label class="Address us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->HouseNumber}},</label>
                            <label class="Address us:text-sm us:font-font-Arial us:font-semibold x:text-lg"> {{$User->Street}}, </label>
                            <label class="Address us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->Barangay}}, </label>
                            <label class="Address us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->Municipality}}, </label>
                            <label class="Address us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->Province}}</label>
                        </div>
                        <div class="">
                            <label class="ContactNumberLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Contact Number:</label>
                            <label class="ContactNumber us:text-sm us:font-font-Arial us:font-semibold x:text-lg">+63{{$User->ContactNumber}}</label>
                        </div>
                        <div class="">
                            <label class="EmailLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Email - Address:</label>
                            <label class="Email us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->email}}</label>
                        </div>
                    </div>
                </div>{{-- Contact Info --}} 
                {{-- Account Info Area--}}
                <div class="AccountInfoArea us:flex us:flex-col us:my-3 us:mx-5">
                    <div class="AccountInfoTitle us:flex us:my-3 us:border-b-4 us:border-black us:mx-2">
                        <label class=" us:font-semibold us:font-font-Arial us:text-xl us:mx-auto x:text-2xl">
                            Account Info
                        </label>
                    </div>
                    <div class="AccountArea ">
                        <div class="">
                            <label class="UsernameLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Username:</label>
                            <label class="Username us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->username}}</label>
                        </div>
                        <div class="">
                            <label class="PasswordLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Password:</label>
                            <label type="password" class="Password w-fit border-none bg-transparent us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{ str_repeat('*', 20 )}}</label>
                        </div>
                    </div>
            </div>
            </div>{{-- Account Info --}} 
            <form action="{{route('RedirectTo.UpdateSettings')}}" method="GET" class="BtnArea us:w-full us:flex us:my-2">
                @csrf
                @method('GET')
                <input type="text" class="" name="find" value="{{$User->username}}" hidden>
                <button type="submit" class="btn btn-info Update us:mx-auto">Update</button>
            </form>
        </div>{{-- Setting Area --}}

</x-AdminNavigation>




@else
    <x-StaffNavigation>
        {{-- Css  --}}
        <link rel="stylesheet" href="{{asset('AdminAccountCss/Settings.css')}}">
    <x-slot:Title>
        Settings
    </x-slot:Title>
        {{-- Setting Area --}}
        <div class="SettingsProfileArea us:bg-white us:mt-3 us:ml-3 us:h-fit us:max-h-[900px] md:h-[780px]">

            {{-- Settings Title --}}
            <div class="SettingsTitle us:bg-blue-500 us:w-full us:flex us:rounded-t-md">
                <label class=" us:text-white us:font-semibold us:font-font-Arial us:italic us:text-xl us:mx-auto us:py-1 x:text-2xl x:py-1">
                    Settings
                </label>
            </div>{{-- Settings Title --}}
    
            <div class="">
                    {{-- Profile Picture --}}
                    <div class="ProfilePicArea us:flex us:mt-3 md:grid md:grid-cols-3 md:ml-10">

                        <div class="ProfilePictureArea us:rounded-full us:w-[200px] us:h-[200px] us:overflow-hidden us:border-black us:border-4 us:mx-auto us:p-1">
                            @if (Auth::user()->profile_picture)
                            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="" class=" profilepicture us:w-full us:h-full us:object-cover us:rounded-full">
                            @else
                            <img src="{{ asset('images/DefaultImage.webp') }}" alt="" class=" profilepicture1 bg-white us:rounded-full us:w-fit us:h-fit">
                            @endif
                        </div>
                        <div class="ProfilePicBtns">
                            
                        </div>
                    </div>{{-- Profile Picture --}}
            </div>
            <div class=" us:overflow-y-auto us:overflow-hidden us:h-full us:max-h-[340px] us:my-2 md:max-h-fit">
                {{-- Info Area --}}
                <div class="ProfileSettingsTitle us:flex us:my-3 us:border-b-4 us:border-black us:mx-6">
                    <label class=" us:font-semibold us:font-font-Arial us:text-xl us:mx-auto x:text-2xl"> 
                        Basic Info
                    </label>
                </div>
                <div class="InfoArea us:flex us:flex-col us:my-3 us:mx-5 md:grid md:grid-cols-3">
                        <div class="">
                            <label class="LastNameLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Last Name:</label>
                            <label class="LastName us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->LastName}}</label>  
                        </div>
                        <div class="">
                            <label class="FirstNameLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">First Name:</label>
                            <label class="FirstName us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->FirstName}}</label>
                        </div>
                        <div class="">
                            <label class="MiddleNameLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Middle Name:</label>
                            <label class="MiddleName us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->MiddleName}}</label>
                        </div>
                        <div class="">
                            <label class="BirthdateLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Birthdate:</label>
                            <label class="Birthdate us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->Birthdate}}</label>
                        </div>
                        <div class="">
                            
                            <label class="AgeLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Age:</label>
                            <label class="Age us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->Age}}</label>
                        </div>
                        <div class="">
                            <label class="GenderLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Gender:</label>
                            <label class="Gender us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->Gender}}</label>
                        </div>
                </div> {{-- Info Area --}}

                {{-- Contact Info Area--}}
                <div class="ContactInfoArea us:flex us:flex-col us:my-3 us:mx-5">
                    <div class="ContactInfoTitle us:flex us:my-3 us:border-b-4 us:border-black us:mx-2">
                        <label class=" us:font-semibold us:font-font-Arial us:text-xl us:mx-auto x:text-2xl">
                            Contact Info
                        </label>
                    </div>
                    <div class="ContactsArea">
                        <div class="">
                            <label class="AddressLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Address:</label>
                            <label class="Address us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->HouseNumber}},</label>
                            <label class="Address us:text-sm us:font-font-Arial us:font-semibold x:text-lg"> {{$User->Street}}, </label>
                            <label class="Address us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->Barangay}}, </label>
                            <label class="Address us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->Municipality}}, </label>
                            <label class="Address us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->Province}}</label>
                        </div>
                        <div class="">
                            <label class="ContactNumberLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Contact Number:</label>
                            <label class="ContactNumber us:text-sm us:font-font-Arial us:font-semibold x:text-lg">+63{{$User->ContactNumber}}</label>
                        </div>
                        <div class="">
                            <label class="EmailLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Email - Address:</label>
                            <label class="Email us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->email}}</label>
                        </div>
                    </div>
                </div>{{-- Contact Info --}} 
                {{-- Account Info Area--}}
                <div class="AccountInfoArea us:flex us:flex-col us:my-3 us:mx-5">
                    <div class="AccountInfoTitle us:flex us:my-3 us:border-b-4 us:border-black us:mx-2">
                        <label class=" us:font-semibold us:font-font-Arial us:text-xl us:mx-auto x:text-2xl">
                            Account Info
                        </label>
                    </div>
                    <div class="AccountArea ">
                        <div class="">
                            <label class="UsernameLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Username:</label>
                            <label class="Username us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{$User->username}}</label>
                        </div>
                        <div class="">
                            <label class="PasswordLabel us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Password:</label>
                            <label type="password" class="Password w-fit border-none bg-transparent us:text-sm us:font-font-Arial us:font-semibold x:text-lg">{{ str_repeat('*', 20 )}}</label>
                        </div>
                    </div>
            </div>
            </div>{{-- Account Info --}} 
            <form action="{{route('RedirectTo.UpdateSettings')}}" method="GET" class="BtnArea us:w-full us:flex us:my-2">
                @csrf
                @method('GET')
                <input type="text" class="" name="find" value="{{$User->username}}" hidden>
                <button type="submit" class="btn btn-info Update us:mx-auto">Update</button>
            </form>
        </div>{{-- Setting Area --}}
    </x-StaffNavigation>
@endif