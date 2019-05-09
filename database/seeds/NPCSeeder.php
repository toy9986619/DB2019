<?php

use Illuminate\Database\Seeder;

class NPCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            App\Models\NPC::create([
                'user_id' => 1,
                'name' => '托尼·史坦克'
            ]);
            App\Models\NPC::create([
                'user_id' => 2,
                'name' => '奇藝博士'
            ]);
            App\Models\NPC::create([
                'user_id' => 3,
                'name' => '雷神索爾'
            ]);
            App\Models\NPC::create([
                'user_id' => 4,
                'name' => '鎂國隊長'
            ]);
        });
    }
}
