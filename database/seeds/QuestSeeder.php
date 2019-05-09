<?php

use Illuminate\Database\Seeder;

class QuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents('database/seeds/json_data/quest.json');
        $json_data = json_decode($data);

        foreach($json_data as $data){
            App\Models\Quest::create((array) $data);
        }
        
        $data = file_get_contents('database/seeds/json_data/preQuest.json');
        $json_data = json_decode($data);

        foreach($json_data as $data){
            App\Models\PreQuest::create((array) $data);
        }

        $data = file_get_contents('database/seeds/json_data/questLog.json');
        $json_data = json_decode($data);

        foreach($json_data as $data){
            App\Models\QuestLog::create((array) $data);
        }

        $data = file_get_contents('database/seeds/json_data/itemLog.json');
        $json_data = json_decode($data);

        foreach($json_data as $data){
            App\Models\ItemLog::create((array) $data);
        }
    }
}
