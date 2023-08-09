<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i = 2; $i <= 4; $i++){
            $arr[] = [
                'user_id'  => $i,
                'type' => 'google',
                'status' => 0,
            ];
            $arr[] = [
                'user_id'  => $i,
                'type' => 'facebook',
                'status' => 0,

            ];
        }
        DB::table('social_logins')->insert($arr);
    }
}
