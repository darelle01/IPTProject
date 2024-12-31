<x-AdminNavigation>
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/AddProgram.css')}}">
    <x-slot:Title>
        Add Program
    </x-slot:Title>

    <div class="AddProgramForm">
        <div class="TitleArea">
            <h2 class="">Add Consultation</h2>
        </div>

        @if (session('Add'))
        <div class="alert alert-success">
            {{ session('Add') }}
        </div>
        @elseif (session('Edit'))
        <div class="alert alert-success">
            {{ session('Edit') }}
        </div>
        @endif

        @error('ConsultationList')
        <div class="alert alert-danger LastName-error">{{ $message }}</div>
        @enderror

        <form action="{{route ('Admin.AddProgram')}}" method="POST" class="InputArea">
            @csrf
            <input type="text" class="ConsultationInput" name="ConsultationList" placeholder="Enter new Consultation *">
            <button type="submit" class="btn btn-info AddProgramBtn">Add</button>
        </form>


        <div  class="ProgramListArea">
            <div class="List">
                <table class="">
                    <thead class="">
                        <tr class="">
                            <th class="ConsultationListLabelArea">Consultation List</td>
                            <th class="ActionLabelArea">Action</td>
                        </tr>
                    </thead>
                    <tbody class="">
   		             @foreach($getAllConsultation as $AllConsultation)
                        <tr class="">
                            <td class="ConsultationListArea">
                                {{$AllConsultation->ConsultationList}}
                            </td>
                            <td class="ActionArea">
                                <span>
                                    <button type="button" value="{{e($AllConsultation->ConsultationList)}}" class="Edit btn btn-info"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$AllConsultation->id}}">
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