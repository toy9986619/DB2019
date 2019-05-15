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
                'user_id' => 35,
                'name' => '托尼·史坦克'
            ]);
            App\Models\NPC::create([
                'user_id' => 36,
                'name' => '奇藝博士'
            ]);
            App\Models\NPC::create([
                'user_id' => 37,
                'name' => '雷神索爾'
            ]);
            App\Models\NPC::create([
                'user_id' => 38,
                'name' => '鎂國隊長'
            ]);
        });
    }
}
