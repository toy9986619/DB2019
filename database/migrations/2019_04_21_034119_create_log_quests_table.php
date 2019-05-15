<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_quests', function (Blueprint $table) {
            $table->integer('team_id')->unsigned()->comment('隊伍編號');
            $table->integer('quest_id')->unsigned()->comment('任務編號');
            $table->timestamps();

            $table->primary(['team_id', 'quest_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_quests');
    }
}
