<?php

// use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            App\Models\User::create([
                'type' => 'admin',
                'name' => 'admin',
                'account' => 'admin',
                'email' => 'test@mail.com',
                'password' => Hash::make('password'),
                'api_token' => str_random(60),
            ]);
        });
    }
}
