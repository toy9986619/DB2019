<?php

use Illuminate\Database\Seeder;

class QuestRewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents('database/seeds/json_data/questReward.json');
        $json_data = json_decode($data);

        foreach($json_data as $data){
            App\Models\QuestReward::create((array) $data);
        }
    }
}
