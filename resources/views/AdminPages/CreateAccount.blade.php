<x-AdminNavigation>
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/AdminCreateAccount.css')}}">
    <x-slot:Title>
        Create Account
    </x-slot:Title>
    <form action="{{route('Admin.Store')}}" method="POST" class="CreateAccountForm bg-white mt-2 ml-3 
    w-4/5 max-h-[950px] h-min lg:max-h-[950px] overflow-auto rounded-3xl" enctype="multipart/form-data">
        @csrf
        <div class="bg-blue-400 text-3xl 2xl:text-5xl italic w-full h-fit font-semibold text-white pl-5 pr-5 pb-2 pt-2 rounded-t-3xl">
            <label>Create Account</label>
        </div>
        @if (session('Create'))
        <div class="alert alert-success">
            {{ session('Create') }}
        </div>
        @endif
        <div class="BasicInfo bg-blue-400 bg-opacity-55 text-xl 2xl:text-3xl font-semibold pl-5 pr-5 pb-2 pt-2">
            <label class="">Basic Information</label>
        </div>
        <div class="container text-start">
            <div class="row">
              <div class="col">
                <input type="text" name="LastName" 
                class="LastName w-32 md:w-40 lg:w-40 xl:w-52 2xl:w-60 m-2 placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-md" 
                placeholder="Last Name *">
            
                @error('LastName')
                <div class="LastName-error text-red-500 ml-3">{{ $message }}</div>
                @enderror
              </div>
              <div class="col">
                <input type="text" name="FirstName" class="FirstName w-32 md:w-40 lg:w-40 xl:w-52 2xl:w-60  m-2 placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-md" placeholder="First Name *">
                @error('FirstName')
                <div class="FirstName-error text-red-500 ml-3">{{ $message }}</div>
                @enderror
              </div>
              <div class="col">
                <input type="text" name="MiddleName" class="MiddleName w-32 md:w-40 lg:w-40 xl:w-52 2xl:w-60 m-2 placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-md" placeholder="Middle Name *">
                @error('MiddleName')
                <div class="MiddleName-error text-red-500 ml-3">{{ $message }}</div>
                @enderror
              </div>
            </div>
        </div>

        <div class="container text-start">
            <div class="row">
              <div class="col p-2">
                <input type="date" id="MyBirthDate" name="Birthdate" class="Birthdate ml-3 placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-md">
                @error('Birthdate')
                <div class="Birthdate-error text-red-500 ml-3">{{ $message }}</div>
                @enderror
              </div>
              <div class="col p-2">
                <input type="number" id="MyAge" name="Age" class="Age ml-3 w-24 placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-md" min="1" placeholder="Age *">
                @error('Age')
                <div class="Age-error text-red-500 ml-3">{{ $message }}</div>
                @enderror
              </div>
              <div class="col p-2">
                <select name="Gender" class="Gender ml-3 placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-md" required>
                    <option value="" disabled selected>Gender *</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @error('Gender')
                    <div class="Gender-error text-red-500 ml-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        </div>

        <div class="ContactAndAddressLabel bg-blue-400 bg-opacity-55 text-xl 2xl:text-3xl font-semibold pl-5 pr-5 pb-2 pt-2 m-0">
            <label class="">Contact and Address</label>
        </div>

        <div class="container text-start">
            <div class="row">
              <div class="col">
                <input type="text" name="HouseNumber" class="HouseNumber m-2 w-28 placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-md" placeholder="House No. *">
                @error('HouseNumber')
                <div class="HouseNumber-error  text-red-500 ml-3">{{ $message }}</div>
                @enderror
              </div>
              <div class="col">
                <input type="text" name="Street" class="Street m-2 placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-md" placeholder="Street *">
                @error('Street')
                <div class="Street-error text-red-500 ml-3">{{ $message }}</div>
                @enderror
              </div>
              <div class="col">
                <input type="text" name="Barangay" class="Barangay m-2 w-80 placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-md" placeholder="Barangay / Subdivision*">
                @error('Barangay')
                <div class="Barangay-error text-red-500 ml-3">{{ $message }}</div>
                @enderror
              </div>
            </div>
        </div>

        <div class="container text-start">
            <div class="row">
              <div class="col">
                <input type="text" name="Municipality" class="Municipality m-2 placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-md" placeholder="Municipality *">
                @error('Municipality')
                <div class="Municipality-error  text-red-500 ml-3">{{ $message }}</div>
                @enderror
              </div>
              <div class="col">
                <input type="text" name="Province" class="Province m-2 placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-md" placeholder="Province *">
                @error('Province')
                <div class="Province-error text-red-500 ml-3">{{ $message }}</div>
                @enderror
              </div>
            </div>
        </div>

        <div class="container text-start">
            <div class="row">
                <div class="col flex flex-col mt-2">
                    <div class="flex items-center">
                        <span class="flag inline-flex items-center w-10 border-l border-y border-black ml-2 px-2 py-2 text-lg rounded-l-md">
                            <img src="{{ asset('images/Ph-Flag.png') }}" alt="PH Flag" class="flagImage h-7 min-w-fit">
                        </span>                     
                        <span class="code inline-flex items-center border-t border-b w-10 border-black pl-0 pr-1 py-2 text-lg font-bold">
                            +63
                        </span>
                        <input type="text" name="ContactNumber" class="ContactNumber placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-r-md border border-black px-2 py-2" placeholder="ContactNumber *">
                    </div>
                    @error('ContactNumber')
                        <div class="ContactNumber-error text-red-500 ml-3 mt-1 w-full">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col">
                    <input type="email" name="email" class="email m-2 placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-md w-80" placeholder="Email-Address *">
                    @error('email')
                    <div class="email-error text-red-500 ml-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="accountLabel bg-blue-400 bg-opacity-55 text-xl 2xl:text-3xl font-semibold pl-5 pr-5 pb-2 pt-2 m-0">
            <label class="">Account</label>
        </div>

        <div class="container text-start">
            <div class="row">
              <div class="col">
                <input type="text" name="username" class="username m-2 placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-md" placeholder="Username *">
                @error('username')
                <div class="username-error text-red-500 ml-3">{{ $message }}</div>
                @enderror
              </div>
              <div class="col">
                <input type="password" name="password" class="password m-2 placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-md" minlength="8" placeholder="Password *">
                <span class="text-muted small d-block ms-2">Use atleast 8 characters one upper, one lower,one number</span>
                @error('password')
                <div class="password-error text-red-500 ml-3">{{ $message }}</div>
                @enderror
              </div>
              <div class="col">
                <input type="file" name="profile_picture" class="profile_picture m-2 w-fit placeholder:italic placeholder:font-semibold placeholder:text-lg text-lg rounded-md border border-black" 
                    accept="image/*" 
                    placeholder="Upload Profile Picture *">
                @error('profile_picture')
                <div class="profile_picture-error text-red-500 ml-3">{{ $message }}</div>
                @enderror
              </div>
            
            </div>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col m-5">
                    <button type="submit" class="Create btn btn-info">Create</button>
                </div>
            </div>
        </div>        
    </form>
    {{-- Javascript Area --}}
    <script src="{{asset('/javascript/AdminBtn/NewPatientPhoneNumber.js')}}"></script>
    <script src="{{asset('/javascript/AdminBtn/Age.js')}}"></script>
</x-AdminNavigation>            