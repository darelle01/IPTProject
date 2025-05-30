<x-AdminNavigation>
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/AddProgram.css')}}">
    <x-slot:Title>
        Add Program
    </x-slot:Title>

    <div class="AddProgramForm us:bg-white us:ml-3 us:mt-3 us:max-h-[700px] xxs:max-w-[270px] xs:max-w-[320px] x:max-w-[380px] us:h-fit us:rounded-md md:max-h-[800px]">
        <div class="TitleArea us:bg-blue-500 us:w-full us:flex us:rounded-t-md">
            <label class=" us:text-white us:font-semibold us:font-font-Arial us:italic us:text-lg us:mx-auto us:py-1 x:text-2lg x:py-1">Add Consultation</label>
        </div>

        @if (session('Add'))
        <div class="alert alert-success text-center">
            {{ session('Add') }}
        </div>
        @elseif (session('Edit'))
        <div class="alert alert-success text-center">
            {{ session('Edit') }}
        </div>
        @endif

        @error('ConsultationList')
        <div class="alert alert-danger text-center">{{ $message }}</div>
        @enderror

        <form action="{{route ('Admin.AddProgram')}}" method="POST" class="InputArea us:m-2 us:flex us:flex-col xs:flex xs:flex-row us:mb-5">
            @csrf
            <div class=" m-auto us:flex us:flex-col md:flex md:flex-row md:space-x-4">
                <input type="text" class="ConsultationInput us:max-w-[190px] us:mx-auto us:my-1 us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[480px]" name="ConsultationList" placeholder="Enter new Consultation">
                <input type="text" class="ConsultaionSched us:max-w-[190px] us:mx-auto us:my-1 us:text-sm us:font-font-Arial us:placeholder:italic us:placeholder:font-semibold us:py-1 us:px-3 x:text-lg x:max-w-[480px]" name="ConsultationSchedule" placeholder="Schedule">
            </div>
            <div class=" m-auto">
                <button type="submit" class="btn btn-info AddProgramBtn us:w-fit us:mx-auto us:my-1">Add</button>
            </div>
        </form>


        <div class="ProgramListArea us:max-h-[475px] us:rounded-md us:mx-2 us:my-2 x:max-h-[530px] md:max-h-[600px] us:overflow-x-auto">
            <div class="List">
                <table class=" us:table-auto x:mx-auto">
                    <thead class=" ">
                        <tr class=" ">
                            <th class="ConsultationListLabelArea us:text-center us:p-1 us:text-base x:text-lg us:font-font-Arial">Consultation List</td>
                            <th class="ConsultationSchedLabelArea us:text-center us:p-1 us:text-base x:text-lg us:font-font-Arial">Schedule</td>
                            <th class="ActionLabelArea us:text-center us:p-1 us:text-base us:px-10 x:text-lg us:font-font-Arial">Action</td>
                        </tr>
                    </thead>
                    <tbody class="">
   		             @foreach($getAllConsultation as $AllConsultation)
                        <tr class="">
                            <td class="ConsultationListArea us:text-center us:text-sm us:p-2 x:text-lg us:font-font-Arial">
                                {{$AllConsultation->ConsultationList}}
                            </td>
                            <td class="ConsultationListArea us:text-center us:text-sm us:p-2 x:text-lg us:font-font-Arial">
                                {{$AllConsultation->ConsultationSchedule}}
                            </td>
                            <td class="ActionArea us:text-center">
                                <span>
                                    <button type="button" value="{{e($AllConsultation->ConsultationList)}}" class="Edit btn btn-info us:font-font-Arial x:text-lg"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$AllConsultation->id}}">
                                        Edit
                                    </button>
                                    {{-- Modal Area --}}
                                    <div class="modal fade" id="exampleModal{{$AllConsultation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Consultation</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{route ('Admin.EditProgram')}}" method="POST" class="">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <input type="text" name="OldConsul" value="{{e($AllConsultation->ConsultationList)}}" class="" hidden>
                                                    <input type="text" name="EditConsul" value="{{e($AllConsultation->ConsultationList)}}" class="">
                                                    <input type="text" name="OldConsulSched" value="{{e($AllConsultation->ConsultationSchedule)}}" class="" hidden>
                                                    <input type="text" name="EditConsulSched" value="{{e($AllConsultation->ConsultationSchedule)}}" class="">
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-primary Edit">Save changes</button>
                                                </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       

    </div>
    
</x-AdminNavigation>