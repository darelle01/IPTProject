<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">    
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Css Area --}}
    <link rel="stylesheet" href="{{asset ('PublicPageCss/HomePage.css')}}" class="">
    <title>Document</title>
</head>
<body class=" us:bg-black">
   <div class=" navigation us:bg-blue-500 us:w-full us:h-fit us:px-2 us:pt-3 us:flex us:flex-col">
        <a class="LogoArea us:mx-auto bg-black us:w-10 us:h-5 us:my-auto"></a>
        <div class=" us:text-center">
        <a class=" us:px-2 us:py-1 us:text-black us:h-fit us:no-underline" type="button" href="">Home</a>
        <a class=" us:px-2 us:py-1 us:text-black us:h-fit us:no-underline" type="button" href="">Consultation Schedule</a>
        <a class=" us:px-2 us:py-1 us:text-black us:h-fit us:no-underline" type="button" href="">Login</a>
        <a class=" us:px-2 us:py-1 us:text-black us:h-fit us:no-underline" type="button" href="">Contact Us</a>
        <a class=" us:px-2 us:py-1 us:text-black us:h-fit us:no-underline" type="button" href="">About Us</a>
        </div>
   </div>
</body>
</html>