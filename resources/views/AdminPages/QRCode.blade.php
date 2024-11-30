@if(Auth::check() && Auth::user()->Position === 'Admin')
    <x-AdminNavigation >
    {{-- Css  --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/Settings.css')}}">
    <x-slot:Title>
        Settings
    </x-slot:Title>

    {!! $PatientQRCode !!}


</x-AdminNavigation>




@else
    <x-StaffNavigation>
        {{-- Css  --}}
        <link rel="stylesheet" href="{{asset('AdminAccountCss/Settings.css')}}">
    <x-slot:Title>
        Settings
    </x-slot:Title>



</x-StaffNavigation>
@endif