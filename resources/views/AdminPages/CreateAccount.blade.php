<x-AdminNavigation>
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/AdminCreateAccount.css')}}">
    <x-slot:Title>
        Create Account
    </x-slot:Title>
    <form action="{{route('Admin.Store')}}" method="POST" class="CreateAccountForm bg-white us:max-w-fit us:mt-3 us:max-h-[700px] xxs:max-w-[250px] xs:max-w-[300px] us:overflow-y-auto us:overflow-hidden us:rounded-md md:max-h-fit" enctype="multipart/form-data">
        @csrf
        <div class="us:bg-blue-500 us:w-full us:flex us:rounded-t-md">
            <label class="us:text-white us:font-semibold us:font-font-Arial us:italic us:text-xl us:mx-auto us:py-1 x:text-2xl x:py-1">Create Account</label>
        </div>
        @if (session('Create'))
        <div class="alert alert-success">
            {{ session('Create') }}
        </div>
        @endif
        <div class="BasicInfo bg-blue-400 bg-opacity-55 us:flex">
            <label class="us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Basic Information</label>
        </div>
            <div class=" us:grid us:grid-cols-1 gap-1 us:my-1 us:mx-3 md:grid md:grid-cols-2 md:gap-3 lg:grid lg:grid-cols-3 lg:gap-3">
              <div class="">
                <input type="text" name="LastName" class="LastName us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" 
                placeholder="Last Name *">
                @error('LastName')
                <div class="LastName-error us:text-red-500 us:text-xs">{{ $message }}</div>
                @enderror
              </div>
              <div class="">
                <input type="text" name="FirstName" class="FirstName us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" placeholder="First Name *">
                @error('FirstName')
                <div class="FirstName-error us:text-red-500 us:text-xs">{{ $message }}</div>
                @enderror
              </div>
              <div class="">
                <input type="text" name="MiddleName" class="MiddleName us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" placeholder="Middle Name *">
                @error('MiddleName')
                <div class="MiddleName-error us:text-red-500 us:text-xs">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class=" us:grid us:grid-cols-1 gap-1 us:my-1 us:mx-3 md:grid md:grid-cols-3 md:gap-3">
              <div class="">
                <input type="date" id="MyBirthDate" name="Birthdate" class="Birthdate us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg">
                @error('Birthdate')
                <div class="Birthdate-error us:text-red-500 us:text-xs">{{ $message }}</div>
                @enderror
              </div>
              <div class="">
                <input type="number" id="MyAge" name="Age" class="Age us:max-w-[70px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:max-w-[90px] x:text-lg" min="1" placeholder="Age *">
                @error('Age')
                <div class="Age-error us:text-red-500 us:text-xs">{{ $message }}</div>
                @enderror
              </div>
              <div class="">
                <select name="Gender" class="Gender us:w-[100px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:w-[130px]" required>
                    <option value="" disabled selected>Gender *</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @error('Gender')
                    <div class="Gender-error us:text-red-500 us:text-xs">{{ $message }}</div>
                @enderror
              </div>
            </div>

        <div class="ContactAndAddressLabel bg-blue-400 bg-opacity-55 us:flex">
            <label class="us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Contact and Address</label>
        </div>

            <div class=" us:grid us:grid-cols-1 gap-1 us:my-1 us:mx-3 md:grid md:grid-cols-2 md:gap-3 lg:grid lg:grid-cols-3 lg:gap-3">
              <div class="">
                <input type="text" name="HouseNumber" class="HouseNumber us:max-w-[100px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[150px]" placeholder="House No. *">
                @error('HouseNumber')
                <div class="HouseNumber-error  us:text-red-500 us:text-xs">{{ $message }}</div>
                @enderror
              </div>
              <div class="">
                <input type="text" name="Street" class="Street us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:max-w-[240px] x:text-lg" placeholder="Street *">
                @error('Street')
                <div class="Street-error us:text-red-500 us:text-xs">{{ $message }}</div>
                @enderror
              </div>
              <div class="">
                <input type="text" name="Barangay" class="Barangay us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:max-w-[240px] x:text-lg" placeholder="Barangay / Subdivision*">
                @error('Barangay')
                <div class="Barangay-error us:text-red-500 us:text-xs">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class=" us:grid us:grid-cols-1 gap-1 us:my-1 us:mx-3 md:grid md:grid-cols-2 md:gap-3 lg:grid lg:grid-cols-3 lg:gap-3">
              <div class="">
                <input type="text" name="Municipality" class="Municipality us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:max-w-[240px] x:text-lg" placeholder="Municipality *">
                @error('Municipality')
                <div class="Municipality-error  us:text-red-500 us:text-xs">{{ $message }}</div>
                @enderror
              </div>
              <div class="">
                <input type="text" name="Province" class="Province us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:max-w-[240px] x:text-lg" placeholder="Province *">
                @error('Province')
                <div class="Province-error us:text-red-500 us:text-xs">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class=" us:grid us:grid-cols-1 gap-1 us:my-1 us:mx-3 md:grid md:grid-cols-2 md:gap-2">
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
                    @error('ContactNumber')
                        <div class="ContactNumber-error us:text-red-500 us:text-xs mt-1 w-full">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="">
                    <input type="email" name="email" class="email us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:max-w-[240px] x:text-lg md:w-auto" placeholder="Email-Address *">
                    @error('email')
                    <div class="email-error us:text-red-500 us:text-xs">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        <div class="accountLabel bg-blue-400 bg-opacity-55 us:flex ">
            <label class="us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Account</label>
        </div>

            <div class=" us:grid us:grid-cols-1 gap-1 us:my-1 us:mx-3 md:grid md:grid-cols-2 md:gap-3 lg:grid lg:grid-cols-3 lg:gap-3">
              <div class="">
                <input type="text" name="username" class="username us:max-w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" placeholder="Username *">
                @error('username')
                <div class="username-error us:text-red-500 us:text-xs">{{ $message }}</div>
                @enderror
              </div>
              <div class=" us:flex us:flex-col">
                <input type="password" name="password" class="password us:max-w-[180px] us:w-fit us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg" minlength="8" placeholder="Password *">
                <span class=" us:text-xs">Use atleast 8 characters one upper, one lower,one number</span>
                @error('password')
                <div class="password-error us:text-red-500 us:text-xs">{{ $message }}</div>
                @enderror
              </div>
              <div class="">
                <input type="file" name="profile_picture" class="profile_picture us:w-[180px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:border x:text-lg x:w-[245px] us:border-black" 
                    accept="image/*" 
                    placeholder="Upload Profile Picture *">
                @error('profile_picture')
                <div class="profile_picture-error us:text-red-500 us:text-xs">{{ $message }}</div>
                @enderror
              </div>            
            </div>

            <div class=" us:my-3 us:flex">
                <div class=" us:mx-auto">
                    <button type="submit" class="Create btn btn-info">Create</button>
                </div>
            </div>     
    </form>
    {{-- Javascript Area --}}
    <script src="{{asset('/javascript/AdminBtn/NewPatientPhoneNumber.js')}}"></script>
    <script src="{{asset('/javascript/AdminBtn/Age.js')}}"></script>
</x-AdminNavigation>            