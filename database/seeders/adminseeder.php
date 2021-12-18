<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'name' => 'wolf',
            'email' => 'ahmedragabyasin2020@gmail.com',
            'password' => bcrypt('258258258'),
        ]);
        User::create([
            'name' => 'aaaa',
            'email' => 'ahmed@gmail.com',
            'password' => bcrypt('258258258'),
        ]);


    }
}
