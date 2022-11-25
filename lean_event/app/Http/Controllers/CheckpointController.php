<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Checkpoint;

class CheckpointController extends Controller
{
    public function index(){
        $checkpoints = DB::table('checkpoints')
            ->get();
        return view('checkpoint/index', [
            'checkpoints' => $checkpoints,
        ]);
    }

    public function create(Request $request){
        $checkpoint = new Checkpoint();
        $checkpoint->name             = $request->name;
        $checkpoint->description      = $request->description;
        $checkpoint->role             = $request->role;
        $checkpoint->time             = $request->time;
        $checkpoint->performance_time = $request->performance_time;
        $checkpoint->save();

        return redirect('/checkpoint');
    }
}
