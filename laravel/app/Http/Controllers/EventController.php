<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(){
        $events = DB::table('events')
            ->where('adminId', Auth::user()->id)
            ->get();
        return view('event/index', [
            'events' => $events,
        ]);
    }

    public function create(Request $request){
        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->adminId = Auth::user()->id;
        $event->save();
        return redirect('/event');
    }
}
