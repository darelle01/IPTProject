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
                            <td class="Name">${account.FirstName} ${account.MiddleName} ${account.LastName}</td>
                            <td class="Username">${account.username}</td>
                            <td class="Position">${account.Position}</td>
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
                            <td class="Name">${account.FirstName} ${account.MiddleName} ${account.LastName}</td>
                            <td class="Username">${account.username}</td>
                            <td class="Position">${account.Position}</td>
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