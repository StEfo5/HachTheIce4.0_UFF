<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $teams = DB::table('teams')->get();
        if ($user->team_id == Null) {
            $team_name = Null;
        }
        else {
            $team_name = DB::table('teams')
                ->where('id', $user->team_id)
                ->first()
                ->name;
        }
        return view('profile/index', [
            'user' => $user,
            'teams' => $teams,
            'team_name' => $team_name,
        ]);
    }

    public function role(Request $request){
        DB::table('users')->where('id', Auth::user()->id)->update(['role' => $request->role]);
        return redirect()->route('profile');
    }
}
