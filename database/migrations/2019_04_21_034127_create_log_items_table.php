<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_items', function (Blueprint $table) {
            $table->integer('team_id')->unsigned()->comment('隊伍編號');
            $table->integer('item_id')->unsigned()->comment('物品編號');
            $table->integer('status')->unsigned()->comment('物品狀態');
            $table->timestamps();

            $table->primary(['team_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_items');
    }
}
