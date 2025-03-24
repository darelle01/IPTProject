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
    <title>Update Password</title>
</head>
<body>

            {{-- Update Password Container --}}
            <div class="ForgotPasswordContainer us:bg-black us:w-fit us:h-fit us:mt-20 us:rounded-md us:mx-2 xxs:mx-auto">

                {{-- Update Password Form --}}
                <form action="{{route('Update.NewPassword')}}" method="POST" class="UpdatePasswordForm">
                    @csrf
                    @method('POST')
                    <div class="TitleArea us:flex us:pt-3 us:w-full us:h-fit">
                        <span class="TitleForm  us:text-lg us:col-start-2 us:px-2 us:text-center us:ml-1 us:mt-3 us:font-semibold us:font-font-Arial x:mx-4 x:text-xl us:text-white">Update Password</span>
                    </div>
                    <div class="InputPasswordArea">
                        <input type="password" name="UpdatePassword" class="InputPassword" placeholder="Password *">
                    </div>
                    <div class="InputPasswordAgainArea">
                        <input type="password" name="ReTypePassword" class="InputAgainPassword" placeholder="Re-type Password">
                    </div>
                    <div class="ErrorsArea">

                    </div>
                    <div class="UpdatePassword">
                        <button type="submit" class="btn btn-primary UpdatePasswordBtn">Confirm</button>
                    </div>
                </form>{{-- Update Password Form --}}

            </div>{{-- Update Password Container --}}

</body>
    {{-- Javascript --}}
    <script src="{{asset('/javascript/Adminpopup.js')}}" ></script>
    <script src="{{asset('/javascript/Staffpopup.js')}}" ></script>
</html>