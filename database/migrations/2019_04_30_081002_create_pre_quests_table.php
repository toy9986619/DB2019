<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_quests', function (Blueprint $table) {
            $table->integer('quest_id')->unsigned()->comment('任務編號');
            $table->integer('pre_quest_id')->unsigned()->comment('前置任務編號');
            $table->timestamps();

            $table->primary(['quest_id', 'pre_quest_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_quests');
    }
}
