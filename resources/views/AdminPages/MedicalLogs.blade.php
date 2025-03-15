@if(Auth::check() && Auth::user()->Position === 'Admin')
    <x-AdminNavigation >
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('AdminAccountCss/AdminMedicalLogs.css') }}">
    {{-- Title --}}
    <x-slot:Title>
        Medical Logs
    </x-slot:Title>

    {{-- Medical Logs --}}
    <div class="MedicalLogsArea us:bg-white us:fit us:mt-5 us:h-fit us:rounded-md us:mx-1 us:w-[300px]">

        {{-- Medical Logs Title --}}
        <div class="MedicalLogsTitleArea us:bg-blue-500 us:w-full us:flex us:rounded-t-md">
            <label class="us:text-white us:font-semibold us:font-font-Arial us:italic us:text-xl us:mx-auto us:py-1 x:text-2xl x:py-1">Patient Medical Logs</label>
        </div>{{-- Medical Logs Title --}}
        

        {{-- Filter --}}
        <form action="{{route('Admin.Filter')}}" method="GET" class="filterForm us:bg-gray-300 us:h-[170px] us:m-1 us:rounded-md x:h-[200px] md:h-[150px] lg:h-[105px] xl:h-[55px]">
            <div class=" md:grid md:grid-cols-2 md:py-2 md:gap-1 lg:grid lg:grid-cols-4 xl:grid xl:grid-cols-5">
                <div class=" us:text-center">
                    <label class="Filter us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg">Filter</label>
                </div>
                
                <div class=" us:text-center ">
                    @foreach($MedicalLogs as $MedicalLogsValue)
                    <input type="text" class="PatientNumber" name="PatientNumber" value="{{$MedicalLogsValue->PatientNumber}}" hidden>
                    @endforeach
                    <select name="FilterByConsultation" class="FilterByConsultation us:w-[200px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg">
                        <option value=""> Consultation </option>
                        @if(isset($PatientConsultation) && count($PatientConsultation) > 0)
                            @foreach ($PatientConsultation as $AllConsultation)
                                <option value="{{ $AllConsultation->Consultation }}">
                                    {{ $AllConsultation->Consultation }}
                                </option>
                            @endforeach
                        @else
                            <option value="">No consultations found</option>
                        @endif
                    </select>
                </div>

                <div class=" us:text-center">
                    <span class="SortOfDateOfConsultationName us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg">Date of check-up</span>
                </div>
                <div class=" us:text-center">
                    <select name="AscOrDesc" class="AscOrDesc us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg">
                        <option value="" disabled selected>Select *</option>
                        <option value="asc">Oldest record</option>
                        <option value="desc">Newest record</option>
                    </select>
                </div>

                <div class=" us:flex md:col-span-2 lg:col-span-4 xl:col-span-1 xl:flex">
                    <button type="submit" class="btn btn-info FilterBtn us:h-fit us:mt-2 us:mx-auto xl:mt-0 xl:mb-1">Go</button>
                </div>
            </div>
        </form>{{-- Filter --}}
        <div class=" us:flex us:px-2">
            @if (session('no_data'))
                <div class="alert alert-danger us:w-full us:text-center">
                    {{ session('no_data') }}
                </div>
            @endif
            
            @if (session('delete'))
                <div class="alert alert-success us:w-full us:text-center">
                    {{ session('delete') }}
                </div>
            @endif
            @if (session('Update'))
            <div class="alert alert-success us:w-full us:text-center">
                {{ session('Update') }}
            </div>
            @endif
        </div>
        {{-- Medical Logs Table Area --}}
        <div class="MedicalLogsTableArea us:overflow-auto us:m-2 us:max-w-[210px] us:max-h-[300px] xxs:max-w-[250px] xs:max-w-[300px] x:max-w-[345px] md:max-w-[3000px] md:max-h-[500px]">
            @if($MedicalLogs->isNotEmpty())
                {{-- Table --}}
                <table class="MedicalLogsTable ">
                    <thead>
                        <tr class=" us:flex">
                            <th class="PatientIDCol us:w-[250px] us:text-center us:my-auto us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Patient ID</th>
                            <th class="ConsultationCol us:w-[250px] us:text-center us:my-auto us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Consultation</th>
                            <th class="RemarksCol us:w-[250px] us:text-center us:my-auto us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Remarks</th>
                            <th class="DateOfConsultationCol us:w-[250px] us:text-center us:my-auto us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Date of Check-up</th>
                            <th class="DateOfUploadCol us:w-[250px] us:text-center us:my-auto us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Date of Upload</th>
                            <th class="FilesCol us:w-[250px] us:text-center us:my-auto us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Files</th>
                            <th class="ActionCol us:w-[250px] us:text-center us:my-auto us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($MedicalLogs as $MedicalLogsValue)
                    <tr class=" us:flex us:border ">
                        <td class="PatientIDValueCol us:border us:w-[250px] us:text-center us:mt-2 us:text-sm us:font-font-Arial  us:py-1 us:px-3 x:text-lg">{{ $MedicalLogsValue->PatientNumber }}</td>

                        <td class="ConsultationValueCol us:border us:w-[250px] us:text-center us:mt-2 us:text-sm us:font-font-Arial  us:py-1 us:px-3 x:text-lg">{{ $MedicalLogsValue->Consultation }}</td>

                        <td class="RemarksValueCol us:max-w-[200px]">
                            <textarea name="Remarks" id="" cols="30" rows="10" class="RemarksValue us:w-[240px] us:max-h-[80px] us:m-2 us:text-sm us:font-font-Arial  us:py-1 us:px-3 x:text-lg" readonly>{{ $MedicalLogsValue->Remarks }}</textarea>
                        </td>

                        <td class="DateOfConsultationValueCol us:ml-14 us:w-[235px] us:text-center us:mt-2 us:text-sm us:font-font-Arial  us:py-1 us:px-3 x:text-lg">{{ $MedicalLogsValue->DateOfConsultation }}</td>

                        <td class="DateOfUploadValueCol us:ml-3 us:w-[242px] us:text-center us:mt-2 us:text-sm us:font-font-Arial  us:py-1 us:px-3 x:text-lg">{{ $MedicalLogsValue->DateOfUpload }}</td>

                        <input type="text" value="{{$MedicalLogsValue->id}}" class="id" hidden>
                        <td class="FilesValueCol  us:ml-3 us:w-[235px] us:text-center us:mt-2">
                            {{-- Go to Viewer Image --}}
                            <a href="{{ route('Admin.ViewImages', ['PatientNumber' => $MedicalLogsValue->PatientNumber,'id' => $MedicalLogsValue->id]) }}" class="btn btn-success ViewImageBtn">View Images</a>
                            {{-- Go to Viewer Image --}}
                        </td>
                        <td class="ActionValueCol us:flex us:ml-3 us:w-[235px] us:text-center us:mt-2">
                            {{-- Delete File --}}
                                <button type="button" class="btn btn-danger Update us:w-fit us:h-fit us:mx-auto" data-bs-toggle="modal" data-bs-target="#deleteModal{{$MedicalLogsValue->id}}">
                                    Delete
                                </button>
                            {{-- Delete File --}}


                            {{-- Modal for Delete Btn --}}
                            <form action="{{route('Admin.DeleteFile',['PatientNumber' => $MedicalLogsValue->PatientNumber, 'id' => $MedicalLogsValue->id])}}" method="POST" class="DeleteFileArea">
                            @csrf
                            @method ('DELETE')
                            <div class="modal fade" id="deleteModal{{$MedicalLogsValue->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header us:bg-blue-500">
                                      <label class=" us:text-lg us:font-semibold us:font-font-Arial " id="exampleModalLabel">Delete Patient {{$MedicalLogsValue->PatientNumber}} Record</label>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="PatientNumber" name="PatientNumber" value="{{$MedicalLogsValue->PatientNumber}}" hidden>
                                        <input type="text" class="id us:font-font-Arial" name="id" value="{{$MedicalLogsValue->id}}" hidden>
                                        Do you want to delete this permanently, including the files inside this record?
                                    </div>
                                    <div class="us:flex us:justify-center us:mb-4">
                                      <button type="submit" class="btn btn-danger us:mx-2">Delete</button>
                                      <button type="button" class="btn btn-info us:mx-2" data-bs-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            </form>{{-- Modal for Delete Btn --}}


                            {{-- Update Button --}}
                            <button type="button" class="btn btn-info Update us:w-fit us:h-fit us:mx-auto" 
                                    data-bs-toggle="modal" data-bs-target="#exampleModal{{ $MedicalLogsValue->id }}">
                                Update
                            </button>
                            {{-- Update Button --}}

                            
                            <!-- Modal for Update Btn-->
                            <div class="modal fade" id="exampleModal{{$MedicalLogsValue->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header us:bg-blue-500">
                                            <label class=" us:text-lg us:font-semibold us:font-font-Arial " id="exampleModalLabel">
                                                Update Patient {{$MedicalLogsValue->PatientNumber}} Record
                                            </label>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('Admin.UpdateFile', ['PatientNumber' => $MedicalLogsValue->PatientNumber, 'id' => $MedicalLogsValue->id]) }}" 
                                                  method="POST" class="UpdateForm">
                                                
                                                @csrf
                                                @method('PUT')
                            
                                                <!-- Hidden Fields -->
                                                <input type="hidden" name="PatientNumber" value="{{ $MedicalLogsValue->PatientNumber }}">
                                                <input type="hidden" name="id" value="{{ $MedicalLogsValue->id }}">
                            
                                                <!-- Consultation Dropdown -->
                                                <div class="ConsultationUpdateArea xxs:flex xxs:flex-col">
                                                    <label class="ConsultationUpdateLabel us:text-lg us:font-semibold us:font-font-Arial">Consultation</label>
                                                    <select name="Consultation" class="FilterByConsultation2 us:w-[270px] us:py-0 us:text-lg us:font-font-Arial xxs:mx-auto xxs:w-[300px]">
                                                        <option value="">Select Consultation</option>
                                                        @foreach ($getAllConsultation as $consultation)
                                                            <option value="{{ $consultation->ConsultationList }}" 
                                                                {{ $MedicalLogsValue->Consultation == $consultation->ConsultationList ? 'selected' : '' }}>
                                                                {{ $consultation->ConsultationList }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="error">
                                                    @error('Consultation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                            
                                                <!-- Remarks Input -->
                                                <div class="RemarksUpdateArea us:flex us:flex-col us:my-2 ">
                                                    <label class="RemarksUpdateLabel us:text-lg us:font-semibold us:font-font-Arial">Remarks</label>
                                                    <textarea type="text" rows="3" name="Remarks" class="RemarksUpdateValue us:text-lg us:font-font-Arial">{{ old('Remarks', $MedicalLogsValue->Remarks) }}</textarea>
                                                </div>
                                                <div class="error">
                                                    @error('Remarks')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                            
                                                <!-- Date of Consultation -->
                                                <div class="DateOfConsultationUpdateArea xs:flex xs:flex-col">
                                                    <label class="DateOfConsultationUpdate us:text-lg us:font-semibold us:font-font-Arial">Date of Check-up</label>
                                                    <input type="date" name="DateOfConsultation" class="DateOfConsultation us:text-lg us:font-font-Arial xs:w-[150px] xs:mx-auto" 
                                                           value="{{ old('DateOfConsultation', $MedicalLogsValue->DateOfConsultation) }}">
                                                </div>
                                                <div class="error">
                                                    @error('DateOfConsultation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                            
                                                <!-- Date of Upload (Read-Only) -->
                                                <div class="DateOfUploadUpdateArea xxs:flex xxs:flex-col">
                                                    <label class="DateOfUploadUpdate us:text-lg us:font-semibold us:font-font-Arial">Date of Upload</label>
                                                    <input type="date" name="DateOfUpload" class="DateOfUpload us:text-lg us:font-font-Arial xxs:w-fit xxs:mx-auto xs:w-[150px]" value="{{ date('Y-m-d') }}" readonly>
                                                </div>
                                                <div class="error">
                                                    @error('DateOfUpload')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                            
                                                <!-- Buttons -->
                                                <div class="btns us:mt-5">
                                                    <button type="submit" class="btn btn-success SaveChanges">Save changes</button>
                                                    <button type="button" class="btn btn-info close" data-bs-dismiss="modal">Close</button>
                                                </div>
                            
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal for Update Btn--> 
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>{{-- Table --}}
            @else
                <div class="NoResultArea us:flex">
                    <p class="NoResult us:mx-auto us:font-semibold us:font-font-Arial">No medical logs found for this patient.</p>
                </div>
            @endif
        </div>{{-- Medical Logs Table Area --}}
         
    </div>{{-- Medical Logs --}}

    </x-AdminNavigation>
@else
    <x-StaffNavigation>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('AdminAccountCss/AdminMedicalLogs.css') }}">
    {{-- Title --}}
    <x-slot:Title>
        Medical Logs
    </x-slot:Title>

    {{-- Medical Logs --}}
    <div class="MedicalLogsArea us:bg-white us:fit us:mt-5 us:h-fit us:rounded-md us:mx-1 us:w-[400px]">

        {{-- Medical Logs Title --}}
        <div class="MedicalLogsTitleArea us:bg-blue-500 us:w-full us:flex us:rounded-t-md">
            <label class="us:text-white us:font-semibold us:font-font-Arial us:italic us:text-xl us:mx-auto us:py-1 x:text-2xl x:py-1">Patient Medical Logs</label>
        </div>{{-- Medical Logs Title --}}
        

        {{-- Filter --}}
        <form action="{{route('Admin.Filter')}}" method="GET" class="filterForm us:bg-gray-300 us:h-[170px] us:m-1 us:rounded-md x:h-[200px] md:h-[150px] lg:h-[105px] xl:h-[55px]">
            <div class=" md:grid md:grid-cols-2 md:py-2 md:gap-1 lg:grid lg:grid-cols-4 xl:grid xl:grid-cols-5">
                <div class=" us:text-center">
                    <label class="Filter us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg">Filter</label>
                </div>
                
                <div class=" us:text-center ">
                    @foreach($MedicalLogs as $MedicalLogsValue)
                    <input type="text" class="PatientNumber" name="PatientNumber" value="{{$MedicalLogsValue->PatientNumber}}" hidden>
                    @endforeach
                    <select name="FilterByConsultation" class="FilterByConsultation us:w-[200px] us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg">
                        <option value=""> Consultation </option>
                        @if(isset($PatientConsultation) && count($PatientConsultation) > 0)
                            @foreach ($PatientConsultation as $AllConsultation)
                                <option value="{{ $AllConsultation->Consultation }}">
                                    {{ $AllConsultation->Consultation }}
                                </option>
                            @endforeach
                        @else
                            <option value="">No consultations found</option>
                        @endif
                    </select>
                </div>

                <div class=" us:text-center">
                    <span class="SortOfDateOfConsultationName us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg">Date of check-up</span>
                </div>
                <div class=" us:text-center">
                    <select name="AscOrDesc" class="AscOrDesc us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg">
                        <option value="" disabled selected>Select *</option>
                        <option value="asc">Oldest record</option>
                        <option value="desc">Newest record</option>
                    </select>
                </div>

                <div class=" us:flex md:col-span-2 lg:col-span-4 xl:col-span-1 xl:flex">
                    <button type="submit" class="btn btn-info FilterBtn us:h-fit us:mt-2 us:mx-auto xl:mt-0 xl:mb-1">Go</button>
                </div>
            </div>
        </form>{{-- Filter --}}
        <div class=" us:flex us:px-2">
            @if (session('no_data'))
                <div class="alert alert-danger us:w-full us:text-center">
                    {{ session('no_data') }}
                </div>
            @endif
            
            @if (session('delete'))
                <div class="alert alert-success us:w-full us:text-center">
                    {{ session('delete') }}
                </div>
            @endif
            @if (session('Update'))
            <div class="alert alert-success us:w-full us:text-center">
                {{ session('Update') }}
            </div>
            @endif
        </div>
        {{-- Medical Logs Table Area --}}
        <div class="MedicalLogsTableArea us:overflow-auto us:m-2 us:max-w-[210px] us:max-h-[300px] xxs:max-w-[250px] xs:max-w-[300px] x:max-w-[345px] md:max-w-[3000px] md:max-h-[500px]">
            @if($MedicalLogs->isNotEmpty())
                {{-- Table --}}
                <table class="MedicalLogsTable ">
                    <thead>
                        <tr class=" us:flex">
                            <th class="PatientIDCol us:w-[250px] us:text-center us:my-auto us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Patient ID</th>
                            <th class="ConsultationCol us:w-[250px] us:text-center us:my-auto us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Consultation</th>
                            <th class="RemarksCol us:w-[250px] us:text-center us:my-auto us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Remarks</th>
                            <th class="DateOfConsultationCol us:w-[250px] us:text-center us:my-auto us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Date of Check-up</th>
                            <th class="DateOfUploadCol us:w-[250px] us:text-center us:my-auto us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Date of Upload</th>
                            <th class="FilesCol us:w-[250px] us:text-center us:my-auto us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Files</th>
                            <th class="ActionCol us:w-[250px] us:text-center us:my-auto us:text-black us:font-semibold us:font-font-Arial us:italic us:text-xl us:pl-3 us:py-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($MedicalLogs as $MedicalLogsValue)
                    <tr class=" us:flex us:border ">
                        <td class="PatientIDValueCol us:border us:w-[250px] us:text-center us:mt-2 us:text-sm us:font-font-Arial  us:py-1 us:px-3 x:text-lg">{{ $MedicalLogsValue->PatientNumber }}</td>

                        <td class="ConsultationValueCol us:border us:w-[250px] us:text-center us:mt-2 us:text-sm us:font-font-Arial  us:py-1 us:px-3 x:text-lg">{{ $MedicalLogsValue->Consultation }}</td>

                        <td class="RemarksValueCol us:max-w-[200px]">
                            <textarea name="Remarks" id="" cols="30" rows="10" class="RemarksValue us:w-[240px] us:max-h-[80px] us:m-2 us:text-sm us:font-font-Arial  us:py-1 us:px-3 x:text-lg" readonly>{{ $MedicalLogsValue->Remarks }}</textarea>
                        </td>

                        <td class="DateOfConsultationValueCol us:ml-14 us:w-[235px] us:text-center us:mt-2 us:text-sm us:font-font-Arial  us:py-1 us:px-3 x:text-lg">{{ $MedicalLogsValue->DateOfConsultation }}</td>

                        <td class="DateOfUploadValueCol us:ml-3 us:w-[242px] us:text-center us:mt-2 us:text-sm us:font-font-Arial  us:py-1 us:px-3 x:text-lg">{{ $MedicalLogsValue->DateOfUpload }}</td>

                        <input type="text" value="{{$MedicalLogsValue->id}}" class="id" hidden>
                        <td class="FilesValueCol  us:ml-3 us:w-[235px] us:text-center us:mt-2">
                            {{-- Go to Viewer Image --}}
                            <a href="{{ route('Admin.ViewImages', ['PatientNumber' => $MedicalLogsValue->PatientNumber,'id' => $MedicalLogsValue->id]) }}" class="btn btn-success ViewImageBtn">View Images</a>
                            {{-- Go to Viewer Image --}}
                        </td>
                        <td class="ActionValueCol us:flex us:ml-3 us:w-[235px] us:text-center us:mt-2">
                            {{-- Delete File --}}
                                <button type="button" class="btn btn-danger Update us:w-fit us:h-fit us:mx-auto" data-bs-toggle="modal" data-bs-target="#deleteModal{{$MedicalLogsValue->id}}">
                                    Delete
                                </button>
                            {{-- Delete File --}}


                            {{-- Modal for Delete Btn --}}
                            <form action="{{route('Admin.DeleteFile',['PatientNumber' => $MedicalLogsValue->PatientNumber, 'id' => $MedicalLogsValue->id])}}" method="POST" class="DeleteFileArea">
                            @csrf
                            @method ('DELETE')
                            <div class="modal fade" id="deleteModal{{$MedicalLogsValue->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header us:bg-blue-500">
                                      <label class=" us:text-lg us:font-semibold us:font-font-Arial " id="exampleModalLabel">Delete Patient {{$MedicalLogsValue->PatientNumber}} Record</label>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="PatientNumber" name="PatientNumber" value="{{$MedicalLogsValue->PatientNumber}}" hidden>
                                        <input type="text" class="id us:font-font-Arial" name="id" value="{{$MedicalLogsValue->id}}" hidden>
                                        Do you want to delete this permanently, including the files inside this record?
                                    </div>
                                    <div class="us:flex us:justify-center us:mb-4">
                                      <button type="submit" class="btn btn-danger us:mx-2">Delete</button>
                                      <button type="button" class="btn btn-info us:mx-2" data-bs-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            </form>{{-- Modal for Delete Btn --}}


                            {{-- Update Button --}}
                            <button type="button" class="btn btn-info Update us:w-fit us:h-fit us:mx-auto" 
                                    data-bs-toggle="modal" data-bs-target="#exampleModal{{ $MedicalLogsValue->id }}">
                                Update
                            </button>
                            {{-- Update Button --}}

                            
                            <!-- Modal for Update Btn-->
                            <div class="modal fade" id="exampleModal{{$MedicalLogsValue->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header us:bg-blue-500">
                                            <label class=" us:text-lg us:font-semibold us:font-font-Arial " id="exampleModalLabel">
                                                Update Patient {{$MedicalLogsValue->PatientNumber}} Record
                                            </label>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('Admin.UpdateFile', ['PatientNumber' => $MedicalLogsValue->PatientNumber, 'id' => $MedicalLogsValue->id]) }}" 
                                                  method="POST" class="UpdateForm">
                                                
                                                @csrf
                                                @method('PUT')
                            
                                                <!-- Hidden Fields -->
                                                <input type="hidden" name="PatientNumber" value="{{ $MedicalLogsValue->PatientNumber }}">
                                                <input type="hidden" name="id" value="{{ $MedicalLogsValue->id }}">
                            
                                                <!-- Consultation Dropdown -->
                                                <div class="ConsultationUpdateArea xxs:flex xxs:flex-col">
                                                    <label class="ConsultationUpdateLabel us:text-lg us:font-semibold us:font-font-Arial">Consultation</label>
                                                    <select name="Consultation" class="FilterByConsultation2 us:w-[270px] us:py-0 us:text-lg us:font-font-Arial xxs:mx-auto xxs:w-[300px]">
                                                        <option value="">Select Consultation</option>
                                                        @foreach ($getAllConsultation as $consultation)
                                                            <option value="{{ $consultation->ConsultationList }}" 
                                                                {{ $MedicalLogsValue->Consultation == $consultation->ConsultationList ? 'selected' : '' }}>
                                                                {{ $consultation->ConsultationList }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="error">
                                                    @error('Consultation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                            
                                                <!-- Remarks Input -->
                                                <div class="RemarksUpdateArea us:flex us:flex-col us:my-2 ">
                                                    <label class="RemarksUpdateLabel us:text-lg us:font-semibold us:font-font-Arial">Remarks</label>
                                                    <textarea type="text" rows="3" name="Remarks" class="RemarksUpdateValue us:text-lg us:font-font-Arial">{{ old('Remarks', $MedicalLogsValue->Remarks) }}</textarea>
                                                </div>
                                                <div class="error">
                                                    @error('Remarks')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                            
                                                <!-- Date of Consultation -->
                                                <div class="DateOfConsultationUpdateArea xs:flex xs:flex-col">
                                                    <label class="DateOfConsultationUpdate us:text-lg us:font-semibold us:font-font-Arial">Date of Check-up</label>
                                                    <input type="date" name="DateOfConsultation" class="DateOfConsultation us:text-lg us:font-font-Arial xs:w-[150px] xs:mx-auto" 
                                                           value="{{ old('DateOfConsultation', $MedicalLogsValue->DateOfConsultation) }}">
                                                </div>
                                                <div class="error">
                                                    @error('DateOfConsultation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                            
                                                <!-- Date of Upload (Read-Only) -->
                                                <div class="DateOfUploadUpdateArea xxs:flex xxs:flex-col">
                                                    <label class="DateOfUploadUpdate us:text-lg us:font-semibold us:font-font-Arial">Date of Upload</label>
                                                    <input type="date" name="DateOfUpload" class="DateOfUpload us:text-lg us:font-font-Arial xxs:w-fit xxs:mx-auto xs:w-[150px]" value="{{ date('Y-m-d') }}" readonly>
                                                </div>
                                                <div class="error">
                                                    @error('DateOfUpload')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                            
                                                <!-- Buttons -->
                                                <div class="btns us:mt-5">
                                                    <button type="submit" class="btn btn-success SaveChanges">Save changes</button>
                                                    <button type="button" class="btn btn-info close" data-bs-dismiss="modal">Close</button>
                                                </div>
                            
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal for Update Btn--> 
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>{{-- Table --}}
            @else
                <div class="NoResultArea us:flex">
                    <p class="NoResult us:mx-auto us:font-semibold us:font-font-Arial">No medical logs found for this patient.</p>
                </div>
            @endif
        </div>{{-- Medical Logs Table Area --}}
         
    </div>{{-- Medical Logs --}}
    </x-StaffNavigation>
@endif