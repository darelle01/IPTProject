<x-AdminNavigation>
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('AdminAccountCss/EventsList.css')}}">
    <x-slot:Title>
        Events List
    </x-slot:Title>

    <form action="{{route('AddEvents')}}" method="POST" class=" us:bg-white us:mx-auto us:h-fit us:mt-10 us:rounded-md x:flex x:flex-col x:w-9/12 x:justify-evenly">
        @csrf
        @method ('POST')
        <div class=" bg-blue-400 us:rounded-t-md mb-3 us:flex">
            <span class=" us:mx-auto us:text-white us:italic us:font-font-Arial us:font-semibold us:p-2 us:text-lg x:text-xl">Add Events</span>
        </div>
        <div class="InputArea us:h-fit us:mx-2 x:flex us:flex-row x:justify-evenly x:flex-wrap">
            <div class="mb-3">
                <input type="text" class="form-control" name="title" id="titleId" placeholder="Title">
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="description" id="descriptionId" rows="3" placeholder="Description"></textarea>
            </div>
            <div class="mb-3">
                <input type="date" class="form-control" name="date" id="titleId" placeholder="Date">
            </div>
            <div class="mb-3">
                <button type="submit" class=" btn bg-info">Save</button>
            </div>
        </div>
    </form>
    <div class=" us:bg-white us:mt-5 us:rounded-md us:w-3/4 us:mx-auto">
        <div class=" bg-blue-400 us:rounded-t-md mb-3 us:flex">
            <span class=" us:mx-auto us:text-white us:italic us:font-font-Arial us:font-semibold us:p-2 us:text-lg x:text-xl">Events List</span>
        </div>
        <div class="DisplayEvents">
            <table class="table-fixed">
                <thead class="">
                    <tr class="">
                        <th class=" us:px-5">Title</th>
                        <th class=" us:px-5">Description</th>
                        <th class=" us:px-5">Date</th>
                        <th class=" us:px-5">Actions</th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr class=" ">
                        <th class=" "></th>
                        <th class=""></th>
                        <th class=""></th>
                        <th class="">
                            <div class="">
                                <button class="">Edit</button>
                                <button class="">Delete</button>
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</x-AdminNavigation>