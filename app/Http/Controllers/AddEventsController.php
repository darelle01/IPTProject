<?php

namespace App\Http\Controllers;

use App\Models\EventList;
use Illuminate\Http\Request;

class AddEventsController extends Controller
{
    public function AddEvents(Request $request){
        $validate_inputs = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date'=> 'required|date',
        ]);
        // dd($validate_inputs);
        // EventList::create($validate_inputs);

        return redirect()->route('Events')->with('eventAdded','Event successfully added!');
    }
}
