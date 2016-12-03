<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_groups', function (Blueprint $table) {
            $table->integer('project_id')->index();
            $table->increments('id');
            $table->string('title', 100);
            $table->text('information')->nullable();
            $table->integer('type_id')->default(1);
            $table->integer('status_id')->default(1);
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->integer('color_id')->default(1);
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
        Schema::dropIfExists('task_groups');
    }
}
