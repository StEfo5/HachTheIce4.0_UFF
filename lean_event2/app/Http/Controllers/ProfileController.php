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
            'name' => $request->name,
            'region' => $request->region,
        ]);
        return redirect('/profile');
    }
}
