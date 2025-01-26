<x-AdminNavigation>
    {{-- Css --}}
    <link rel="stylesheet" href="{{ asset('AdminAccountCss/ActiveAccountList.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminAccountCss/DeactivatedAccountList.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="{{asset('/javascript/jquery.js')}}" ></script>
    
    <x-slot:Title>
        Account List
    </x-slot:Title>

    {{-- Active Account List --}}
    <div class="ActiveAccountArea">
        <div class="TitleArea">
            <h2>Active Accounts</h2>    
        </div>
        <div class="Error">
            @error('')
            <div class="">{{ $message }}</div>
            @enderror
        </div>
        <div class="TableArea">
            <table class="AccountsTable">
                <thead>
                <tr>
                    <th class="">Name</th>
                    <th class="">Username</th>
                    <th class="">Position</th>
                    <th class="">Status</th>
                    <th class="">Actions</th>
                </tr>
            </thead>

            <tbody id="ActiveAccountsList">
                
            </tbody>
            </table>
        </div>
    </div>{{-- Active Account List --}}

    {{-- ------------------------------------------------------------------------------------------------- --}}

    {{-- Deactivated Account List --}}
    <div class="DeactivatedAccountArea">
        <div class="TitleArea">
            <h2>Deactivated Accounts</h2>
        </div>
        <div class="Error">
            @error('')
            <div class="">{{ $message }}</div>
            @enderror
        </div>
        <div class="TableArea">
            <table class="AccountsTable">
                <thead>
                <tr>
                    <th class="">Name</th>
                    <th class="">Username</th>
                    <th class="">Position</th>
                    <th class="">Status</th>
                    <th class="">Actions</th>
                </tr>
                </thead>
                <tbody id="DeActivatedAccountsList">
                </tbody>
            </table>
        </div>
    </div>{{-- Deactivated Account List --}}
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function fetchData() {
            fetch('{{ route("Fetch.AccountList") }}', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token here
                }
            })
            .then(response => response.json())
            .then(data => {
                var ActiveListOfAccounts = document.getElementById('ActiveAccountsList');
                var DeActivatedListOFAccounts = document.getElementById('DeActivatedAccountsList');

                // Clear any existing rows to prevent repeating the list
                ActiveListOfAccounts.innerHTML = '';
                DeActivatedListOFAccounts.innerHTML = '';

                // Populate active accounts
                data.ActiveAccounts.forEach(function(account) {
                    var row = `
                        <tr>
                            <td>${account.FirstName} ${account.MiddleName} ${account.LastName}</td>
                            <td>${account.username}</td>
                            <td>${account.Position}</td>
                            <td class="${account.ActivityStatus === 'Online' ? '' : 'offline'}">
                                ${account.ActivityStatus === 'Online' ? 
                                '<div class="OnlineArea"><span class="Online">Online</span><div class="bg-success bg-gradient circle1"></div></div>' : 
                                '<div class="OfflineArea"><span class="Offline">Offline</span><div class="bg-danger bg-gradient circle2"></div></div>'}
                            </td>
                            <td class="BtnArea">
                                <form action="{{ route('Redirect.UpdateAccount') }}" method="GET">
                                    @csrf
                                    <input type="text" name="username" value="${account.username}" hidden>
                                    <button type="submit" class="btn btn-info Update">Update</button>
                                </form>
                                <form action="{{ route('Admin.Deactivated') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" name="Deactivate" value="${account.username}" class="btn btn-danger Deactivate">Deactivate</button>
                                </form>
                            </td>
                        </tr>`;
                    ActiveListOfAccounts.insertAdjacentHTML('beforeend', row);
                });

                // Populate deactivated accounts
                data.DeactivatedAccounts.forEach(function(account) {
                    var row = `
                        <tr>
                            <td>${account.FirstName} ${account.MiddleName} ${account.LastName}</td>
                            <td>${account.username}</td>
                            <td>${account.Position}</td>
                            <td class="${account.ActivityStatus === 'Online' ? '' : 'offline'}">
                                ${account.ActivityStatus === 'Online' ? 
                                '<div class="OnlineArea"><span class="Online">Online</span><div class="bg-success bg-gradient circle1"></div></div>' : 
                                '<div class="OfflineArea"><span class="Offline">Offline</span><div class="bg-danger bg-gradient circle2"></div></div>'}
                            </td>
                            <td class="BtnArea">
                                <form action="{{ route('Redirect.UpdateAccount') }}" method="GET">
                                    @csrf
                                    <input type="text" name="username" value="${account.username}" hidden>
                                    <button type="submit" class="btn btn-info Update">Update</button>
                                </form>
                                <form action="{{ route('Admin.Activated') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" name="Activate" value="${account.username}" class="btn btn-danger Activate">Activate</button>
                                </form>
                            </td>
                        </tr>`;
                    DeActivatedListOFAccounts.insertAdjacentHTML('beforeend', row);
                });
            })
            .catch(error => console.error('Error fetching data:', error));
        }

        // Initial fetch
        fetchData();

        // Fetch data every 30 seconds
        setInterval(fetchData, 30000);
    });
    </script>
  

</x-AdminNavigation>