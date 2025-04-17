<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    {{-- Bootstrap --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    {{-- Fontawesome --}}
    {{-- <script src="https://kit.fontawesome.com/6d462838cf.js" crossorigin="anonymous"></script> --}}
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('LoginCss/Background.css')}}">
    <link rel="stylesheet" href="{{asset('LoginCss/OTP.css')}}" >
    <title>OTP Confirmation</title>
</head>
<body>
    
    {{-- OTP Container --}}
    <div class="OTPContainer us:bg-black us:w-full us:max-w-[250px] us:h-full us:max-h-[700px] us:mt-10 us:mx-auto us:rounded-md x:max-w-[400px]">

        {{-- OTP Form --}}
        <div class="OTPForm">
        {{-- form for inputing the OTP to verifying --}}
        <form action="{{route('StaffOTP.Confirm')}}" method="POST" class="">
            @csrf
            @method('POST')
            <div class="OTPLabelArea us:flex">
                <h2 class="OTPLAbel us:text-lg us:mx-auto us:my-3 us:text-white us:font-font-Arial us:font-semibold us:text-center x:text-2xl">Enter the OTP for verification.</h2>
            </div>
            <div class="OTPInput us:flex">
                <input type="text" name="OTPcode" class="OTPValue us:mx-auto us:my-2">
            </div>
            <div class="OTPerror">
                @error('OTPcode')
                <span class="alert alert-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="OTPBtnArea">
                <button type="submit" class="btn btn-primary OTPBtn">Confirm</button>
            </div>
        </form>{{-- OTP Form --}}
        </div>
    </div>{{-- OTP Container --}}

</body>
    {{-- Javascript --}}
    <script src="{{asset('/javascript/Adminpopup.js')}}" ></script>
    <script src="{{asset('/javascript/Staffpopup.js')}}" ></script>
</html>