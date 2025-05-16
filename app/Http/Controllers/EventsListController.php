<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsListController extends Controller
{
    public function ShowEventsList() {
        return view('AdminPages.EventsList');
    }
}
