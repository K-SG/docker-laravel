<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('schedule_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->char('place',1);
            $table->string('title',100);
            $table->string('content',1440)->nullable();
            $table->integer('actual_time')->nullable();
            $table->string('comment',1440)->nullable();
            $table->char('delete_flag',1);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
