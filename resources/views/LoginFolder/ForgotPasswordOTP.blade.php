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
    
    <title>Forgot Passowrd OTP Verification</title>
</head>
<body>

            {{-- Forgot Password Container --}}
            <div class="ForgotPasswordContainer us:bg-black us:w-fit us:h-fit us:mt-20 us:rounded-md us:mx-2 xxs:mx-auto">

                {{-- Forgot Password OTP Form --}}
                {{-- form for inputing the OTP to verifying --}}
                <form action="{{route('ForgotPassword.Verfication')}}" method="POST" class="ForgotPasswordOTPForm">
                    @csrf
                    @method('POST')

                    <div class="TitleArea us:flex us:pt-3 us:w-full us:h-fit us:text-center">
                        <span class="ForgotPasswordOTPTitle us:font-semibold us:font-font-Arial us:text-2xl x:text-3xl us:text-white xxs:mx-4 x:mx-6">
                            Enter the Verification Code
                        </span>
                    </div>
                    <div class="InputVerificationCodeArea us:flex">
                        <input type="text" name="EmailCode" class="InputVerificationCode us:w-full us:mx-4 us:my-2 us:rounded-md">
                    </div>
                    <div class="Errors">
                        @error('EmailCode')
                        <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="SubmitBtnArea us:flex us:my-2">
                        <button type="submit" class="btn btn-primary SubmitBtn us:mx-auto us:mb-2">Submit</button>
                    </div>
                </form>{{-- Forgot Password OTP Form --}}

            </div>{{-- Forgot Password Container --}}

</body>
    {{-- Javascript --}}
    <script src="{{asset('/javascript/Adminpopup.js')}}" ></script>
    <script src="{{asset('/javascript/Staffpopup.js')}}" ></script>
</html>