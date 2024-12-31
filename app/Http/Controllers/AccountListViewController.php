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
        return view('AdminPages.AccountList');
    }
}