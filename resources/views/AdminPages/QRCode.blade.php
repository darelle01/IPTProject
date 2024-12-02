@if(Auth::check() && Auth::user()->Position === 'Admin')
    <x-AdminNavigation >
    {{-- Css  --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/QRCode.css')}}">
    <x-slot:Title>
        Settings
    </x-slot:Title>
    {{-- Qr-Code --}}
    <div class="QrCodeArea">
        <div class="Code">
            <img src="data:image/svg+xml;base64, {!! $PatientQRCode !!} " />
        </div>
        <div class="PatientInfo">
           {{$PatientInfo->LastName}} 
        </div>


        
    </div>{{-- Qr-Code --}}


</x-AdminNavigation>




@else
    <x-StaffNavigation>
        {{-- Css  --}}
        <link rel="stylesheet" href="{{asset('AdminAccountCss/QRCode.css')}}">
    <x-slot:Title>
        Settings
    </x-slot:Title>
    <div class="QrCodeArea">
        <div class="Code">
            <img src="data:image/svg+xml;base64, {!! $PatientQRCode !!} " />
        </div>
        <div class="PatientInfo">
           {{$PatientInfo->LastName}} 
        </div>


        
    </div>{{-- Qr-Code --}}


</x-StaffNavigation>
@endif