<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents('database/seeds/json_data/item.json');
        $json_data = json_decode($data);

        foreach($json_data as $data){
            App\Models\Item::create((array) $data);
        }
    }
}
