<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function all($checkpoint_id){
        $teams = DB::table('users')
            ->where('role', 0)
            ->get();
        $apiToken = "5824203782:AAGfMMRUygCYl3hYL8-atmR9Y_1DqI4v95g";
        
        foreach($teams as $item){
            $start = DB::table('performances')
                ->where('checkpoint_id', $checkpoint_id)
                ->where('team_id', $item->id)
                ->value('start');
            $chat_id = $item->chat_id;
            $data = [
                'chat_id' => $chat_id,
                'text' => 'Время вашего выступления: '.$start,
            ];
            $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));
        }
        return back();
    }
}
