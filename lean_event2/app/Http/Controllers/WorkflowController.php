<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class WorkflowController extends Controller
{
    public function index(){
        $teams = DB::table('users')
            ->where('role', 0)
            ->orderBy('score', 'desc')
            ->get();
        return view('workflow/index', [
            'teams' => $teams,
        ]);
    }
}
