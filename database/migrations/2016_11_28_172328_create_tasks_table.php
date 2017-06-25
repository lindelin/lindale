<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->integer('project_id')->index();
            $table->increments('id');
            $table->integer('initiator_id')->nullable();
            $table->string('title', 100);
            $table->text('content')->nullable();
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->integer('cost')->default(0);
            $table->integer('spend')->nullable();
            $table->integer('progress')->default(0);
            $table->integer('user_id')->nullable();
            $table->integer('color_id')->default(1);
            $table->integer('type_id')->default(1);
            $table->integer('status_id')->default(1);
            $table->integer('group_id')->nullable();
            $table->integer('priority_id')->default(1);
            $table->integer('task_id')->nullable();
            $table->boolean('is_finish')->default(false);
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
        Schema::dropIfExists('tasks');
    }
}
