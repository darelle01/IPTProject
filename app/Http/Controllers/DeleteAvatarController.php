<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountsModel;
use Illuminate\Support\Facades\Storage;

class DeleteAvatarController extends Controller
{
    public function DeleteAvatar(Request $request){
        $Image = $request->validate([
            'targetAcc' => 'required|string',
        ]);
    
        $user = AccountsModel::where('username', $Image['targetAcc'])->first();
    
       
        if ($user && !empty($user->profile_picture)) {
            Storage::disk('public')->delete($user->profile_picture);
            $user->profile_picture = null; 
            $user->save(); 
        }
    
        return redirect()->route('Settings.View')->with('success', 'Profile picture removed.');
    }
    
}