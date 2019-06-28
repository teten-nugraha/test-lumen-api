<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('template_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->datetime('due')->nullable();
            $table->string('urgency')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('last_update_by')->unsigned()->nullable();
            $table->timestamps();
            $table->datetime('completed_at');

            $table->foreign('template_id')->references('id')->on('templates');
            $table->foreign('last_update_by')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklist');
    }
}
