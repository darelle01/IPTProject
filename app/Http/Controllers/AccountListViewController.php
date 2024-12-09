<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\AccountsModel;
use Illuminate\Support\Facades\DB;

class AccountListViewController extends Controller
{
    public function ViewAccountList()
    {
        
        $AllActiveAccounts = AccountsModel::where('Position', 'Staff')
                                    ->where('Status', 'Active')
                                    ->get();
        $AllDeactivedAccounts = AccountsModel::where('Position', 'Staff')
                                    ->where('Status', 'Deactivated')
                                    ->get();

        if ($AllActiveAccounts->isEmpty() && $AllDeactivedAccounts->isEmpty()) { 
            return view('AdminPages.AccountList', compact('AllActiveAccounts', 'AllDeactivedAccounts')) ->with(['NoAccount' => 'No Accounts']); 
        }

        return view('AdminPages.AccountList',compact(['AllActiveAccounts','AllDeactivedAccounts']));
    }
}