<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountsModel;
use Illuminate\Support\Facades\Auth;

class EditStaffAccountController extends Controller
{
    public function EditStaffAccount(Request $request){
    // dd("didnt reach validation");
        $EditStaffAccounts = $request->validate([
            'LastName' => 'string',
            'FirstName' => 'string',
            'MiddleName' => 'string',
            'Birthdate' => 'date',
            'Age' => 'integer',
            'Gender' => 'string',
            'HouseNumber' => 'string',
            'Street' => 'string',
            'Barangay' => 'string',
            'Municipality' => 'string',
            'Province' => 'string',
            'email' => 'email',
            'ContactNumber' => 'string|regex:/^\d{10}$/',
            'OldUsername' => 'nullable|string',
            'username' => 'nullable|string|unique:accounts,username,' . $request->OldUsername . ',username',
            'password' => 'nullable|string|min:8|regex:/[0-9]/|regex:/[@$!%*?&#]/|regex:/[A-Z]/',
        ]);
      
        if (filled($EditStaffAccounts['username']) && filled($EditStaffAccounts['password'])) {
            $Update = AccountsModel::where('username', $EditStaffAccounts['OldUsername'])->first();
            if ($Update) {
                $Update->update([
                    'LastName' => $EditStaffAccounts['LastName'],
                    'FirstName' => $EditStaffAccounts['FirstName'],
                    'MiddleName' => $EditStaffAccounts['MiddleName'],
                    'Birthdate' => $EditStaffAccounts['Birthdate'],
                    'Age' => $EditStaffAccounts['Age'],
                    'Gender' => $EditStaffAccounts['Gender'],
                    'HouseNumber' => $EditStaffAccounts['HouseNumber'],
                    'Street' => $EditStaffAccounts['Street'],
                    'Barangay' => $EditStaffAccounts['Barangay'],
                    'Municipality' => $EditStaffAccounts['Municipality'],
                    'Province' => $EditStaffAccounts['Province'],
                    'email' => $EditStaffAccounts['email'],
                    'ContactNumber' => $EditStaffAccounts['ContactNumber'],
                ]);

                if ($EditStaffAccounts['username'] !== $Update->username && $EditStaffAccounts['password'] !== $Update->password) {
                    $Update->update([
                        'LastName' => $EditStaffAccounts['LastName'],
                        'FirstName' => $EditStaffAccounts['FirstName'],
                        'MiddleName' => $EditStaffAccounts['MiddleName'],
                        'Birthdate' => $EditStaffAccounts['Birthdate'],
                        'Age' => $EditStaffAccounts['Age'],
                        'Gender' => $EditStaffAccounts['Gender'],
                        'HouseNumber' => $EditStaffAccounts['HouseNumber'],
                        'Street' => $EditStaffAccounts['Street'],
                        'Barangay' => $EditStaffAccounts['Barangay'],
                        'Municipality' => $EditStaffAccounts['Municipality'],
                        'Province' => $EditStaffAccounts['Province'],
                        'email' => $EditStaffAccounts['email'],
                        'ContactNumber' => $EditStaffAccounts['ContactNumber'],
                        'username' => $EditStaffAccounts['username'],
                        'password' => $EditStaffAccounts['password'],
                    ]);
                }
                if ($EditStaffAccounts['username'] === $Update->username && $EditStaffAccounts['password'] !== $Update->password) {
                    $Update->update([
                        'LastName' => $EditStaffAccounts['LastName'],
                        'FirstName' => $EditStaffAccounts['FirstName'],
                        'MiddleName' => $EditStaffAccounts['MiddleName'],
                        'Birthdate' => $EditStaffAccounts['Birthdate'],
                        'Age' => $EditStaffAccounts['Age'],
                        'Gender' => $EditStaffAccounts['Gender'],
                        'HouseNumber' => $EditStaffAccounts['HouseNumber'],
                        'Street' => $EditStaffAccounts['Street'],
                        'Barangay' => $EditStaffAccounts['Barangay'],
                        'Municipality' => $EditStaffAccounts['Municipality'],
                        'Province' => $EditStaffAccounts['Province'],
                        'email' => $EditStaffAccounts['email'],
                        'ContactNumber' => $EditStaffAccounts['ContactNumber'],
                        'password' => $EditStaffAccounts['password'],
                    ]);
                }
                if ($EditStaffAccounts['username'] !== $Update->username && $EditStaffAccounts['password'] === $Update->password) {
                    $Update->update([
                        'LastName' => $EditStaffAccounts['LastName'],
                        'FirstName' => $EditStaffAccounts['FirstName'],
                        'MiddleName' => $EditStaffAccounts['MiddleName'],
                        'Birthdate' => $EditStaffAccounts['Birthdate'],
                        'Age' => $EditStaffAccounts['Age'],
                        'Gender' => $EditStaffAccounts['Gender'],
                        'HouseNumber' => $EditStaffAccounts['HouseNumber'],
                        'Street' => $EditStaffAccounts['Street'],
                        'Barangay' => $EditStaffAccounts['Barangay'],
                        'Municipality' => $EditStaffAccounts['Municipality'],
                        'Province' => $EditStaffAccounts['Province'],
                        'email' => $EditStaffAccounts['email'],
                        'ContactNumber' => $EditStaffAccounts['ContactNumber'],
                        'username' => $EditStaffAccounts['username'],
                    ]);
                }
                $Update->save();
                return redirect()->route('Account.List')->with(['Success' => 'Updating Account Successfully']);
            }
        }
    }
}
