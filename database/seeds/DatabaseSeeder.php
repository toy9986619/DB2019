<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(TeamTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(NPCSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(QuestSeeder::class);
        $this->call(QuestRewardSeeder::class);
    }
}
