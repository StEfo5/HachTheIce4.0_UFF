<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Checkpoint;
use App\Models\Performance;
use App\Models\Criteria;
use App\Models\Option;
use Carbon\Carbon;
use DateTimeImmutable;
use DateTime;
use App\Http\Controllers\NotificationController;

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
        $ended = DB::table('checkpoints')
            ->where('id', $checkpoint_id)
            ->value('ended');
        return view('checkpoints/checkpoint', [
            'performances' => $performances,
            'criterias' => $criterias,
            'checkpoint_id' => $checkpoint_id,
            'ended' => $ended,
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

    public function option_create($checkpoint_id, $criteria_id, Request $request){
        $option = new Option();
        $option->name        = $request->name;
        $option->criteria_id = $criteria_id;
        $option->score       = $request->score;
        $option->save();
        return back();
    }

    public function team($checkpoint_id, $team_id){
        $criterias = DB::table('criterias')
            ->where('checkpoint_id', $checkpoint_id)
            ->get();
        $team = DB::table('users')
            ->where('id', $team_id)
            ->value('name');
        return view('checkpoints/team', [
            'checkpoint_id' => $checkpoint_id,
            'team_id' => $team_id,
            'criterias' => $criterias,
            'team' => $team,
        ]);
    }

    public function expertise($checkpoint_id, $team_id, Request $request){
        $checkpoint = DB::table('checkpoints')
            ->where('id', 'checkpoint_id')
            ->value('role');
        $sum = 0;
        $criterias = DB::table('criterias')
            ->where('checkpoint_id', $checkpoint_id)
            ->get();
        foreach ($criterias as $item) {
            $sum+=$request->input(str($item->id));
        }
        DB::table('performances')
            ->where('checkpoint_id', $checkpoint_id)
            ->where('team_id', $team_id)
            ->update([
                'score' => $sum,
                'comment' => $request->comment,
            ]);

        $this_performance_id = DB::table('performances')
            ->where('checkpoint_id', $checkpoint_id)
            ->where('team_id', $team_id)
            ->value('id');
        $next_id = DB::table('performances')
            ->where('checkpoint_id', $checkpoint_id)
            ->where([
                ['id', '>' , $this_performance_id],
                ['id', '<=', $this_performance_id + 2], 
            ])
            ->get();

        if(count($next_id) > 0){
            $apiToken = "5824203782:AAGfMMRUygCYl3hYL8-atmR9Y_1DqI4v95g";
            $team1 = DB::table('users')
                ->where('id', $next_id[0]->team_id)
                ->get()[0];
            $data = [
                'chat_id' => $team1->chat_id,
                'text' => 'Время вашего выступления: '.$next_id[0]->start,
            ];
            $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));
            if (count($next_id)>1) {
                $team2 = DB::table('users')
                    ->where('id', $next_id[1]->team_id)
                    ->get()[0];
                $data2 = [
                    'chat_id' => $team2->chat_id,
                    'text' => 'Время вашего выступления: '.$next_id[1]->start,
                ];
                $response2 = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data2));
            }
        }

        return redirect()->route('checkpoint', [
            'checkpoint_id' => $checkpoint_id,
        ]);
    }

    public function end($checkpoint_id){
        $teams = DB::table('users')
            ->where('role', 0)
            ->get();
        $checkpoint_role = DB::table('checkpoints')
            ->where('id', $checkpoint_id)
            ->value('role');
        foreach ($teams as $item) {
            $score = DB::table('users')
                ->where('id', $item->id)
                ->value($checkpoint_role.'_score');
            $d_score = DB::table('performances')
                ->where('team_id', $item->id)
                ->value('score');
            DB::table('users')
                ->where('id', $item->id)
                ->update([
                    $checkpoint_role.'_score' => $score + $d_score,
                    'score' => $item->score + $d_score,
                ]);
        }
        DB::table('checkpoints')
            ->where('id', $checkpoint_id)
            ->update([
                'ended' => true,
            ]);
        return back();
    }
}
