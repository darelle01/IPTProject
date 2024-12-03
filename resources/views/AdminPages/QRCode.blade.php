@if(Auth::check() && Auth::user()->Position === 'Admin')
    <x-AdminNavigation >
    {{-- Css  --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/QRCode.css')}}">
    <x-slot:Title>
        QR Code
    </x-slot:Title>
    {{-- Qr-Code --}}
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"></script>

    <div class="QrCodeArea" id="QrCodeArea">
        <div class="Code">
            <img src="data:image/svg+xml;base64, {!! $PatientQRCode !!} " class="QRCode"/>
        </div>
        <div class="Info">
            <div class="labelPatientName">
                <label>Patient Name</label>
            </div>
            <div class="PatientName">
                {{$PatientInfo->LastName}}, {{$PatientInfo->FirstName}} {{$PatientInfo->MiddleName}} 
            </div>
            <div class="labelAddress">
                <label for="" class="">Address</label>
            </div>
            <div class="PatientAddress">
                {{$PatientInfo->Street}},{{$PatientInfo->HouseNo}},{{$PatientInfo->Barangay}},{{$PatientInfo->Municipality}},{{$PatientInfo->Province}}
            </div>
            <div class="LineSigniture">
                _______________________
            </div>
            <div class="labelSignature">
                <label for="" class="">Signature</label>
            </div>
        </div> 
    </div>{{-- Qr-Code --}}
    <button onclick="DownloadWQRcode()" class="QR-Download btn bg-primary">Download Qr-Code</button>


    <script>
        function DownloadWQRcode() {
        var element = document.getElementById('QrCodeArea');
        html2canvas(element).then(function(canvas) {
        var imgData = canvas.toDataURL('image/png');
        var link = document.createElement('a');
        link.href = imgData;
        link.download = 'QrCode.png';
        link.click();
    });
}

    </script>


</x-AdminNavigation>




@else
    <x-StaffNavigation>
    {{-- Css  --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/QRCode.css')}}">
    <x-slot:Title>
        QR Code
    </x-slot:Title>
    {{-- Qr-Code --}}
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"></script>

    <div class="QrCodeArea" id="QrCodeArea">
        <div class="Code">
            <img src="data:image/svg+xml;base64, {!! $PatientQRCode !!} " class="QRCode"/>
        </div>
        <div class="Info">
            <div class="labelPatientName">
                <label>Patient Name</label>
            </div>
            <div class="PatientName">
                {{$PatientInfo->LastName}}, {{$PatientInfo->FirstName}} {{$PatientInfo->MiddleName}} 
            </div>
            <div class="labelAddress">
                <label for="" class="">Address</label>
            </div>
            <div class="PatientAddress">
                {{$PatientInfo->Street}},{{$PatientInfo->HouseNo}},{{$PatientInfo->Barangay}},{{$PatientInfo->Municipality}},{{$PatientInfo->Province}}
            </div>
            <div class="LineSigniture">
                _______________________
            </div>
            <div class="labelSignature">
                <label for="" class="">Signature</label>
            </div>
        </div> 
    </div>{{-- Qr-Code --}}
    <button onclick="DownloadWQRcode()" class="QR-Download btn bg-primary">Download Qr-Code</button>


    <script>
        function DownloadWQRcode() {
        var element = document.getElementById('QrCodeArea');
        html2canvas(element).then(function(canvas) {
        var imgData = canvas.toDataURL('image/png');
        var link = document.createElement('a');
        link.href = imgData;
        link.download = 'QrCode.png';
        link.click();
    });
}

    </script>


</x-StaffNavigation>
@endif