<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('profile/index', [
            'user' => $user,
        ]);
    }

    public function update(Request $request){
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
            'team' => $request->team,
            'region' => $request->region,
            'ceo_id' => $request->ceo_id,
            'cdo_id' => $request->cdo_id,
            'cto_id' => $request->cto_id,
        ]);
        return redirect('/profile');
    }
}
