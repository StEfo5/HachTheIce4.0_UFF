<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $teams = DB::table('registration')->get();
        foreach ($teams as $item) {
            $user = new User();
            $user->name    = $item->name;
            $user->email   = $item->email;
            $user->chat_id = $item->chatID;
            $user->region  = $item->regions;
            $password = Str::random(8);
            $apiToken = "5824203782:AAGfMMRUygCYl3hYL8-atmR9Y_1DqI4v95g";
            $data = [
                'chat_id' => $item->chatID,
                'text' => 'Your password: '.$password,
            ];
            $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));
            $user->password = Hash::make($password);
            $user->save();
        }
        $tracker = new User();
        $tracker->name = 'tracker';
        $tracker->email = 'tracker@mail.ru';
        $tracker->password = Hash::make('12345678');
        $tracker->role = 1;
        $tracker->save();
    }
}
