<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $arr[] = [
            'name'  => 'admin',
            'username' => 'admin',
            'password' => bcrypt(123456),
            'email' => 'admin@gmail.com',
            'avatar'=> "images/avatar/role2.png",
            'role_id' => 2,
        ];
        for($i = 1; $i <= 3; $i++){
            $arr[] = [
                'name'  => '10000' . $i,
                'username' => '10000' . $i,
                'password' => bcrypt(123456),
                'email' => '10000' .$i.'@gmail.com',
                'avatar'=> "images/avatar/role1.png",
                'role_id' => 1,
            ];
        }
        User::insert($arr);
    }
}
