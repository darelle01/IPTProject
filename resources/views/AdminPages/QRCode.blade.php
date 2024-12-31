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
        <div class="InfoAndLogoArea">
        <div class="CardLogoArea">
        </div>    
        <div class="Info">
            <div class="PatientNameArea">
                <label for="" class="NameLabel">Name :</label>
                <label for="" class="PatientName">
                    {{$PatientInfo->LastName}}, {{$PatientInfo->FirstName}} {{$PatientInfo->MiddleName}}
                </label>
            </div>
            <div class="AddressArea">
                <label for="" class="AddressName">Address :</label>
                <label for="" class="PatientAddress">
                    {{$PatientInfo->HouseNumber}}, {{$PatientInfo->Street}}, {{$PatientInfo->Barangay}}, {{$PatientInfo->Municipality}}, {{$PatientInfo->Province}}
                </label>
            </div>
            <div class="PhoneNoArea">
                <label for="" class="PhoneNoLabel">Phone No.</label>
                <label for="" class="PatientPhoneNo">
                    +63{{$PatientInfo->ContactNumber }}
                </label>
            </div>
            <div class="SignatureArea">
                <label for="" class="SignatureLine">_____________________________</label>
                <label for="" class="SignatureLabel">Signature</label>
            </div>
        </div>
        </div>
    </div>{{-- Qr-Code --}}
    <button id="QrCodeBtn" onclick="DownloadWQRcode()" class="QR-Download btn bg-primary">Download Qr-Code</button>

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
        <div class="InfoAndLogoArea">
        <div class="CardLogoArea">
        </div>    
        <div class="Info">
            <div class="PatientNameArea">
                <label for="" class="NameLabel">Name :</label>
                <label for="" class="PatientName">
                    {{$PatientInfo->LastName}}, {{$PatientInfo->FirstName}} {{$PatientInfo->MiddleName}}
                </label>
            </div>
            <div class="AddressArea">
                <label for="" class="AddressName">Address :</label>
                <label for="" class="PatientAddress">
                    {{$PatientInfo->HouseNumber}}, {{$PatientInfo->Street}}, {{$PatientInfo->Barangay}}, {{$PatientInfo->Municipality}}, {{$PatientInfo->Province}}
                </label>
            </div>
            <div class="PhoneNoArea">
                <label for="" class="PhoneNoLabel">Phone No.</label>
                <label for="" class="PatientPhoneNo">
                    +63{{$PatientInfo->ContactNumber }}
                </label>
            </div>
            <div class="SignatureArea">
                <label for="" class="SignatureLine">_____________________________</label>
                <label for="" class="SignatureLabel">Signature</label>
            </div>
        </div>
        </div>
    </div>{{-- Qr-Code --}}
    <button id="QrCodeBtn" onclick="DownloadWQRcode()" class="QR-Download btn bg-primary">Download Qr-Code</button>

</x-StaffNavigation>
@endif