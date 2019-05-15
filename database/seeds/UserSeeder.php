<?php

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
        factory(App\Models\User::class, 30)->create()->each(function ($user) {
            App\Models\TeamMember::create([
                'team_id' => ($user->id % 5) + 1,
                'user_id' => $user->id,
                'type' => '隊員'
            ]);
        });

        factory(App\Models\User::class, 5)->create([
            'type' => 'worker'
        ])->each(function ($user) {
            App\Models\TeamMember::create([
                'team_id' => ($user->id % 5) + 1,
                'user_id' => $user->id,
                'type' => '隊輔'
            ]);
        });

        factory(App\Models\User::class, 10)->create([
            'type' => 'worker'
        ]);
    }
}
