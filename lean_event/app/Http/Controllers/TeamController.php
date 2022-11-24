<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Team;

class TeamController extends Controller
{
    public function create(Request $request){
        $team = new Team();
        $team->name = $request->name;
        $team->manager_id = Auth::user()->id;
        $team->save();
        $team = DB::table('teams')
            ->where('name', $request->name)
            ->first();
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['team_id' => $team->id]);
        return redirect()->route('profile');
    }

    public function select(Request $request){
        DB::table('teams')
            ->where('id', $request->team_id)
            ->update([Auth::user()->role.'_id' => Auth::user()->id]);
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['team_id' => $request->team_id]);
        return redirect()->route('profile');
    }
}
