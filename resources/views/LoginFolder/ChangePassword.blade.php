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
            <div class="ForgotPasswordContainer us:bg-black us:w-fit us:h-fit us:mt-20 us:rounded-md us:mx-auto xxs:mx-auto">

                {{-- Update Password Form --}}
                <form action="{{route('Update.NewPassword')}}" method="POST" class="UpdatePasswordForm us:flex us:flex-col">
                    @csrf
                    @method('POST')
                    <div class="TitleArea us:flex us:pt-3 us:w-full us:h-fit us:px-3">
                        <span class="TitleForm us:mx-auto us:font-semibold us:font-font-Arial us:text-2xl x:text-3xl us:text-white">Update Password</span>
                    </div>
                    <div class="InputPasswordArea us:flex">
                        <input type="password" name="UpdatePassword" class="InputPassword us:w-full us:mx-4 us:my-2 us:rounded-md" placeholder="Password *">
                    </div>
                    <div class="InputPasswordAgainArea us:flex">
                        <input type="password" name="ReTypePassword" class="InputAgainPassword us:w-full us:mx-4 us:my-2 us:rounded-md" placeholder="Re-type Password">
                    </div>
                    <div class="ErrorsArea">

                    </div>
                    <div class="UpdatePassword us:flex">
                        <button type="submit" class="btn btn-primary UpdatePasswordBtn us:mx-auto us:my-2">Confirm</button>
                    </div>
                </form>{{-- Update Password Form --}}

            </div>{{-- Update Password Container --}}

</body>
    {{-- Javascript --}}
    <script src="{{asset('/javascript/Adminpopup.js')}}" ></script>
    <script src="{{asset('/javascript/Staffpopup.js')}}" ></script>
</html>