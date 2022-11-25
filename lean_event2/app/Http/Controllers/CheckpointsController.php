<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Checkpoint;
use App\Models\Performance;
use App\Models\Criteria;
use App\Models\Option;
use DateTimeImmutable;
use DateTime;

class CheckpointsController extends Controller
{
    public function index(){
        $checkpoints = DB::table('checkpoints')->get();
        return view('checkpoints/index', [
            'checkpoints' => $checkpoints,
        ]);
    }

    public function create(Request $request){
        $checkpoint = new Checkpoint();
        $checkpoint->name                  = $request->name;
        $checkpoint->description           = $request->description;
        $checkpoint->start                 = $request->start;
        $checkpoint->time                  = $request->time;
        $checkpoint->role                  = $request->role;
        $checkpoint->save();

        $checkpoint_id = DB::table('checkpoints')->where('name', $request->name)->get()[0]->id;

        $teams = DB::table('users')->where('role', 0)->get();
        $time0 = new DateTime($request->start);
        $d_time = $request->time;

        foreach($teams as $item){
            $performance = new Performance();
            $performance->team_id        = $item->id;
            $performance->checkpoint_id  = $checkpoint_id;
            $performance->start           = $time0;
            $performance->save();
            $time0 = $time0->modify("+".$d_time." minutes");
        }

        return redirect('/checkpoints');
    }

    public function checkpoint($checkpoint_id){
        $performances = DB::table('performances')
            ->where('checkpoint_id', $checkpoint_id)
            ->get();
        $criterias = DB::table('criterias')
            ->where('checkpoint_id', $checkpoint_id)
            ->get();
        return view('checkpoints/checkpoint', [
            'performances' => $performances,
            'criterias' => $criterias,
            'checkpoint_id' => $checkpoint_id,
        ]);
    }

    public function criteria_create($checkpoint_id, Request $request){
        $criteria = new Criteria();
        $criteria->name            = $request->name;
        $criteria->checkpoint_id   = $request->checkpoint_id;
        $criteria->save();
        
        return redirect()->route('checkpoint', [
            'checkpoint_id' => $checkpoint_id,
        ]);
    }
}
