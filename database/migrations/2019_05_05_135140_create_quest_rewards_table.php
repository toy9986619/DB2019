<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quest_rewards', function (Blueprint $table) {
            $table->integer('quest_id')->unsigned()->comment('任務編號');
            $table->integer('item_id')->unsigned()->comment('物品編號');
            $table->timestamps();

            $table->primary(['quest_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quest_rewards');
    }
}
