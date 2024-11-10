<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('email', '=', 'admin@bitcoincoinmarketgrant.us')->first();
        if($admin === null){
            DB::table('users')->insert([
                'firstname' => 'Admin',
                'lastname' => 'Panel',
                'status' => 2,
                'username' =>'admin',
                'admin' => 1,
                'balance' => 500000,
                'profit' => 600000,
                'currency' => "$",
                'email' => 'admin@bitcoincoinmarketgrant.us',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => Hash::make('ADMINPASS1234'),
            ]);
        }
    }

}
