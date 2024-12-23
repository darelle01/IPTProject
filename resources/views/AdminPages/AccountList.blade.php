<x-AdminNavigation>
    {{-- Css --}}
    <link rel="stylesheet" href="{{ asset('AdminAccountCss/ActiveAccountList.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminAccountCss/DeactivatedAccountList.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    
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
    <script class="">
        
$(document).ready(function() {
    $.ajaxSetup({ 
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } 
    });

    function fetchData() {
        $.ajax({
            url: '{{ route("Fetch.AccountList") }}',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var ActiveListOfAccounts = $('#ActiveAccountsList');
                var DeActivatedListOFAccounts = $('#DeActivatedAccountsList');

                // Clear any existing rows and prevent to repeating the list
                ActiveListOfAccounts.empty();
                DeActivatedListOFAccounts.empty();

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
                    ActiveListOfAccounts.append(row);
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
                    DeActivatedListOFAccounts.append(row);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Initial fetch
    fetchData();

   
    setInterval(fetchData, 30000);
});
    </script>
  

</x-AdminNavigation>