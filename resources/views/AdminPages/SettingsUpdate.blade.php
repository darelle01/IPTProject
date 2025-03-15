@if(Auth::check() && Auth::user()->Position === 'Admin')
    <x-AdminNavigation >
    {{-- Css  --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/UpdateSettings.css')}}">
    <x-slot:Title>
        Settings
    </x-slot:Title>
    
       {{-- Setting Area --}}
       <div class="SettingsProfileArea us:bg-white us:mt-3 us:ml-3">
        {{-- Settings Title --}}
        <div class="SettingsTitle us:bg-blue-500 us:w-full us:flex us:rounded-t-md">
            <h2 class=" us:text-white us:font-semibold us:font-font-Arial us:italic us:text-xl us:mx-auto us:py-1 x:text-2xl x:py-1">
                Settings Update
            </h2>
        </div>{{-- Settings Title --}}

        {{-- Profile Picture Area --}}
        <div class="ProfileSettingsArea">
                <div class="BasicInfo">

                    {{-- Profile Picture --}}
                    <div class="ProfilePicArea us:flex us:flex-col us:my-3 md:grid md:grid-cols-3 md:ml-10">

                        <div class="ProfilePictureArea us:rounded-full us:w-[200px] us:h-[200px] us:overflow-hidden us:border-black us:border-4 us:mx-auto us:p-1">
                            @if (Auth::user()->profile_picture)
                            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="profilepicture us:w-full us:h-full us:object-cover us:rounded-full">
                            @else
                            <img src="{{ asset('images/DefaultImage.webp') }}" alt="" class="img-thumbnail profilepicture1 bg-white us:rounded-full us:w-fit us:h-fit">
                            @endif
                        </div>
                        <div class="ProfilePicBtns us:flex us:flex-col us:my-2 md:grid md:grid-row-1">
                            <div class="UploadArea us:flex">
                                <button type="button" class="btn btn-primary upload us:mx-auto us:my-1 md:w-fit md:h-fit md:my-auto" data-bs-toggle="modal" data-bs-target="#exampleModalUpload">
                                    Upload Avatar
                                </button>
                            </div>
                            {{-- Update Avatar Modal --}}
                            <div class="modal fade" id="exampleModalUpload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('Update.Avatar')}}" method="POST" class="" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <input type="text" name="targetAcc" value="{{$User->username}}" class="" hidden>
                                                    <input class="form-control" type="file" id="formFile" accept="image/*" name="profile_picture">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                            </div>{{-- Update Avatar Modal --}}

                            <div class="DeleteArea us:flex">
                                <button type="button" class="btn btn-danger delete us:mx-auto us:my-1 md:w-fit md:h-fit md:my-auto" data-bs-toggle="modal" data-bs-target="#exampleModaldelete">
                                    Delete Avatar
                                </button>
                            {{-- Delete Avatar Modal  --}}
                            <div class="modal fade" id="exampleModaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route ('Delete.Avatar')}}" method="POST" class="" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <h5 class="">Do you really want to delete your profile picture?</h5>
                                                <input type="text" name="targetAcc" value="{{$User->username}}" class="" hidden>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                </div>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                            </div>{{-- Delete Avatar Modal  --}}
                            </div>
                        </div>

                    </div>{{-- Profile Picture --}}
                    

                </div>
        </div>{{-- Profile Picture Area --}}                    
        <form action="{{route('Settings.UpdateSave')}}" method="POST" class="SettingsForm us:flex us:flex-col x:mx-3">
                    @csrf
                    @method('PUT')
            <div class=" UpdateAccount us:border-t us:border-b us:border-gray-200 us:mx-2 us:h-auto us:overflow-y-auto us:overflow-hidden">
                <div class=" us:h-full us:max-h-[420px] us:my-2 md:max-h-fit">
                    <div class="ProfileSettingsTitle us:flex us:my-3 us:border-b-4 us:border-black us:mx-6">
                        <label class=" us:font-semibold us:font-font-Arial us:text-xl us:mx-auto x:text-2xl">
                            Basic Info
                        </label>
                    </div>
                    {{-- Info Area --}}
                    <div class="InfoArea us:flex us:flex-col md:grid md:grid-cols-2 xl:grid xl:grid-cols-3">
                        <div class=" us:flex us:flex-col x:flex x:flex-row x:my-1">
                            <label class="LastNameLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Last Name</label>
                            <input type="text" name="LastName" value="{{$User->LastName}}" class="LastName us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px] x:ml-0" required>
                        </div>
                        <div class=" us:flex us:flex-col x:flex x:flex-row x:my-1">
                            <label class="FirstNameLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">First Name</label>
                            <input type="text" name="FirstName" value="{{$User->FirstName}}" class="FirstName us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px] x:ml-0" required>
                        </div>
                        <div class=" us:flex us:flex-col x:flex x:flex-row x:my-1">
                            <label class="MiddleNameLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Middle Name</label>
                            <input type="text" name="MiddleName" value="{{$User->MiddleName}}" class="MiddleName us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px] x:ml-0" required>
                        </div>
                        <div class=" us:flex us:flex-col x:flex x:flex-row x:my-1">
                            <label class="BirthdateLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Birthdate</label>
                            <input type="date" name="Birthdate" value="{{$User->Birthdate}}" class="Birthdate us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-fit x:ml-0" required>
                        </div>
                        <div class=" us:flex us:flex-col x:flex x:flex-row x:my-1">
                            <label class="AgeLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Age</label>
                            <input type="number" name="Age" class="Age us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-fit x:ml-0" value="{{$User->Age}}" min="18" max="100" required>
                        </div>
                        <div class=" us:flex us:flex-col x:flex x:flex-row x:my-1">
                            <label class="GenderLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Gender</label>
                            <select name="Gender" class="Gender us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-fit x:ml-0" required>
                                <option value="{{$User->Gender}}">{{$User->Gender}}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div> {{-- Info Area --}}
            

                    {{-- Contact Info Area--}}
                    <div class="ContactInfoArea">
                        <div class="ContactInfoTitle us:flex us:my-3 us:border-b-4 us:border-black us:mx-6">
                            <label class=" us:font-semibold us:font-font-Arial us:text-xl us:mx-auto x:text-2xl">
                                Contact Info
                            </label>
                        </div>
                        <div class="ContactsArea us:flex us:flex-col ">
                            <div class=" us:flex us:flex-col md:flex md:flex-row md:flex-wrap">
                                <label class="AddressLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Address</label>
                                <input type="text" name="HouseNumber" value="{{$User->HouseNumber}}" class="HouseNumber us:my-1 us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[100px]" placeholder="House No. *" required>
                                <input type="text" name="Street" value="{{$User->Street}}" class="Street us:my-1 us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px]" placeholder="Street *" required>
                                <input type="text" name="Barangay" value="{{$User->Barangay}}" class="Barangay us:my-1 us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px]" placeholder="Barangay/Subd. *" required>
                                <input type="text" name="Municipality" value="{{$User->Municipality}}" class="Municipality us:my-1 us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px]" placeholder="Municipality/City *" required>
                                <input type="text" name="Province" value="{{$User->Province}}" class="Province us:my-1 us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px] " placeholder="Province *" required>
                            </div>

                            <div class=" md:grid md:grid-cols-2 xl:grid xl:grid-cols-3">
                            <div class=" us:flex us:flex-col">
                                <label class="ContactNumberLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Contact Number</label>
                               <div class=" us:flex us:flex-row us:border us:border-black us:my-1 us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:w-[170px] x:w-[200px]">
                                <span class="flag us:flex ">
                                    <img src="{{ asset('images/Ph-Flag.png') }}" alt="PH Flag" class="flagImage us:max-h-5 us:my-auto us:ml-1">
                                </span>                     
                                <span class="code us:my-auto us:mx-0 us:px-2 us:border-r us:border-solid x:text-lg us:border-black">
                                    +63
                                </span>
                                <input type="text" name="ContactNumber" class="ContactNumber us:border-none us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-0 us:px-3 us:w-full" value="{{$User->ContactNumber}}" maxlength="10" minlength="10" required>
                               </div>
                            </div>

                            <div class=" us:flex us:flex-col ">
                                <label class="EmailLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Email - Address</label>
                                <input type="text" name="email" value="{{$User->email}}" class="email us:my-1 us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px] x:w-[210px]" required>
                            </div>
                            </div>
                        </div>
                    </div>{{-- Contact Info --}} 
                    {{-- Account Info Area--}}
                    <div class="AccountInfoArea">
                        <div class="AccountInfoTitle us:flex us:my-3 us:border-b-4 us:border-black us:mx-6">
                            <label class=" us:font-semibold us:font-font-Arial us:text-xl us:mx-auto x:text-2xl">
                                Account Info
                            </label>
                        </div>
                        <div class="AccountArea md:grid md:grid-cols-2 xl:grid xl:grid-cols-3">
                            <div class=" us:flex us:flex-col ">
                                <label class="UsernameLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Username:</label>
                                <input type="text" name="username" class="Username us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px]" >
                            </div>
                            <div class=" us:flex us:flex-col ">
                                <label class="PasswordLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Password:</label>
                                <input type="password" name="password" class="password us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px] us:mb-2" >
                            </div>
                        </div>
                    </div>{{-- Account Info --}}
                </div>
            </div>
                <div class="BtnArea us:h-full us:flex us:my-2 ">
                    <button type="submit" class="btn btn-info Update us:m-auto">Save</button>
                </div>
        </form>
        </div>
        </div>{{-- Setting Area --}}

</x-AdminNavigation>




@else
    <x-StaffNavigation>
    {{-- Css  --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/UpdateSettings.css')}}">
    <x-slot:Title>
        Settings
    </x-slot:Title>
    
       {{-- Setting Area --}}
       <div class="SettingsProfileArea us:bg-white us:mt-3 us:ml-3">
        {{-- Settings Title --}}
        <div class="SettingsTitle us:bg-blue-500 us:w-full us:flex us:rounded-t-md">
            <h2 class=" us:text-white us:font-semibold us:font-font-Arial us:italic us:text-xl us:mx-auto us:py-1 x:text-2xl x:py-1">
                Settings Update
            </h2>
        </div>{{-- Settings Title --}}

        {{-- Profile Picture Area --}}
        <div class="ProfileSettingsArea">
                <div class="BasicInfo">

                    {{-- Profile Picture --}}
                    <div class="ProfilePicArea us:flex us:flex-col us:my-3 md:grid md:grid-cols-3 md:ml-10">

                        <div class="ProfilePictureArea us:rounded-full us:w-[200px] us:h-[200px] us:overflow-hidden us:border-black us:border-4 us:mx-auto us:p-1">
                            @if (Auth::user()->profile_picture)
                            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="profilepicture us:w-full us:h-full us:object-cover us:rounded-full">
                            @else
                            <img src="{{ asset('images/DefaultImage.webp') }}" alt="" class="img-thumbnail profilepicture1 bg-white us:rounded-full us:w-fit us:h-fit">
                            @endif
                        </div>
                        <div class="ProfilePicBtns us:flex us:flex-col us:my-2 md:grid md:grid-row-1">
                            <div class="UploadArea us:flex">
                                <button type="button" class="btn btn-primary upload us:mx-auto us:my-1 md:w-fit md:h-fit md:my-auto" data-bs-toggle="modal" data-bs-target="#exampleModalUpload">
                                    Upload Avatar
                                </button>
                            </div>
                            {{-- Update Avatar Modal --}}
                            <div class="modal fade" id="exampleModalUpload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('Update.Avatar')}}" method="POST" class="" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <input type="text" name="targetAcc" value="{{$User->username}}" class="" hidden>
                                                    <input class="form-control" type="file" id="formFile" accept="image/*" name="profile_picture">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                            </div>{{-- Update Avatar Modal --}}

                            <div class="DeleteArea us:flex">
                                <button type="button" class="btn btn-danger delete us:mx-auto us:my-1 md:w-fit md:h-fit md:my-auto" data-bs-toggle="modal" data-bs-target="#exampleModaldelete">
                                    Delete Avatar
                                </button>
                            {{-- Delete Avatar Modal  --}}
                            <div class="modal fade" id="exampleModaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route ('Delete.Avatar')}}" method="POST" class="" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <h5 class="">Do you really want to delete your profile picture?</h5>
                                                <input type="text" name="targetAcc" value="{{$User->username}}" class="" hidden>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                </div>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                            </div>{{-- Delete Avatar Modal  --}}
                            </div>
                        </div>

                    </div>{{-- Profile Picture --}}
                    

                </div>
        </div>{{-- Profile Picture Area --}}                    
        <form action="{{route('Settings.UpdateSave')}}" method="POST" class="SettingsForm us:flex us:flex-col x:mx-3">
                    @csrf
                    @method('PUT')
            <div class=" UpdateAccount us:border-t us:border-b us:border-gray-200 us:mx-2 us:h-auto us:overflow-y-auto us:overflow-hidden">
                <div class=" us:h-full us:max-h-[420px] us:my-2 md:max-h-fit">
                    <div class="ProfileSettingsTitle us:flex us:my-3 us:border-b-4 us:border-black us:mx-6">
                        <label class=" us:font-semibold us:font-font-Arial us:text-xl us:mx-auto x:text-2xl">
                            Basic Info
                        </label>
                    </div>
                    {{-- Info Area --}}
                    <div class="InfoArea us:flex us:flex-col md:grid md:grid-cols-2 xl:grid xl:grid-cols-3">
                        <div class=" us:flex us:flex-col x:flex x:flex-row x:my-1">
                            <label class="LastNameLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Last Name</label>
                            <input type="text" name="LastName" value="{{$User->LastName}}" class="LastName us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px] x:ml-0" required>
                        </div>
                        <div class=" us:flex us:flex-col x:flex x:flex-row x:my-1">
                            <label class="FirstNameLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">First Name</label>
                            <input type="text" name="FirstName" value="{{$User->FirstName}}" class="FirstName us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px] x:ml-0" required>
                        </div>
                        <div class=" us:flex us:flex-col x:flex x:flex-row x:my-1">
                            <label class="MiddleNameLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Middle Name</label>
                            <input type="text" name="MiddleName" value="{{$User->MiddleName}}" class="MiddleName us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px] x:ml-0" required>
                        </div>
                        <div class=" us:flex us:flex-col x:flex x:flex-row x:my-1">
                            <label class="BirthdateLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Birthdate</label>
                            <input type="date" name="Birthdate" value="{{$User->Birthdate}}" class="Birthdate us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-fit x:ml-0" required>
                        </div>
                        <div class=" us:flex us:flex-col x:flex x:flex-row x:my-1">
                            <label class="AgeLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Age</label>
                            <input type="number" name="Age" class="Age us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-fit x:ml-0" value="{{$User->Age}}" min="18" max="100" required>
                        </div>
                        <div class=" us:flex us:flex-col x:flex x:flex-row x:my-1">
                            <label class="GenderLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Gender</label>
                            <select name="Gender" class="Gender us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-fit x:ml-0" required>
                                <option value="{{$User->Gender}}">{{$User->Gender}}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div> {{-- Info Area --}}
            

                    {{-- Contact Info Area--}}
                    <div class="ContactInfoArea">
                        <div class="ContactInfoTitle us:flex us:my-3 us:border-b-4 us:border-black us:mx-6">
                            <label class=" us:font-semibold us:font-font-Arial us:text-xl us:mx-auto x:text-2xl">
                                Contact Info
                            </label>
                        </div>
                        <div class="ContactsArea us:flex us:flex-col ">
                            <div class=" us:flex us:flex-col md:flex md:flex-row md:flex-wrap">
                                <label class="AddressLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Address</label>
                                <input type="text" name="HouseNumber" value="{{$User->HouseNumber}}" class="HouseNumber us:my-1 us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[100px]" placeholder="House No. *" required>
                                <input type="text" name="Street" value="{{$User->Street}}" class="Street us:my-1 us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px]" placeholder="Street *" required>
                                <input type="text" name="Barangay" value="{{$User->Barangay}}" class="Barangay us:my-1 us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px]" placeholder="Barangay/Subd. *" required>
                                <input type="text" name="Municipality" value="{{$User->Municipality}}" class="Municipality us:my-1 us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px]" placeholder="Municipality/City *" required>
                                <input type="text" name="Province" value="{{$User->Province}}" class="Province us:my-1 us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px] " placeholder="Province *" required>
                            </div>

                            <div class=" md:grid md:grid-cols-2 xl:grid xl:grid-cols-3">
                            <div class=" us:flex us:flex-col">
                                <label class="ContactNumberLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Contact Number</label>
                               <div class=" us:flex us:flex-row us:border us:border-black us:my-1 us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:w-[170px] x:w-[200px]">
                                <span class="flag us:flex ">
                                    <img src="{{ asset('images/Ph-Flag.png') }}" alt="PH Flag" class="flagImage us:max-h-5 us:my-auto us:ml-1">
                                </span>                     
                                <span class="code us:my-auto us:mx-0 us:px-2 us:border-r us:border-solid x:text-lg us:border-black">
                                    +63
                                </span>
                                <input type="text" name="ContactNumber" class="ContactNumber us:border-none us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-0 us:px-3 us:w-full" value="{{$User->ContactNumber}}" maxlength="10" minlength="10" required>
                               </div>
                            </div>

                            <div class=" us:flex us:flex-col ">
                                <label class="EmailLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Email - Address</label>
                                <input type="text" name="email" value="{{$User->email}}" class="email us:my-1 us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px] x:w-[210px]" required>
                            </div>
                            </div>
                        </div>
                    </div>{{-- Contact Info --}} 
                    {{-- Account Info Area--}}
                    <div class="AccountInfoArea">
                        <div class="AccountInfoTitle us:flex us:my-3 us:border-b-4 us:border-black us:mx-6">
                            <label class=" us:font-semibold us:font-font-Arial us:text-xl us:mx-auto x:text-2xl">
                                Account Info
                            </label>
                        </div>
                        <div class="AccountArea md:grid md:grid-cols-2 xl:grid xl:grid-cols-3">
                            <div class=" us:flex us:flex-col ">
                                <label class="UsernameLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Username:</label>
                                <input type="text" name="username" class="Username us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px]" >
                            </div>
                            <div class=" us:flex us:flex-col ">
                                <label class="PasswordLabel us:mx-auto us:py-2 us:text-sm us:font-font-Arial us:font-semibold x:text-lg">Password:</label>
                                <input type="password" name="password" class="password us:mx-auto us:text-sm us:font-font-Arial us:font-semibold x:text-lg us:py-1 us:px-2 us:w-[170px] us:mb-2" >
                            </div>
                        </div>
                    </div>{{-- Account Info --}}
                </div>
            </div>
                <div class="BtnArea us:h-full us:flex us:my-2 ">
                    <button type="submit" class="btn btn-info Update us:m-auto">Save</button>
                </div>
        </form>
        </div>
        </div>{{-- Setting Area --}}
    </x-StaffNavigation>
@endif