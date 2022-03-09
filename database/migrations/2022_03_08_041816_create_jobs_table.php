<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedTinyInteger('job_visibility');
            $table->string('name');
            $table->string('description', 5000);
            $table->unsignedTinyInteger('project_time');
            $table->unsignedTinyInteger('project_type');
            $table->unsignedTinyInteger('experience_level');
            $table->unsignedTinyInteger('price_type');
            $table->decimal('price', 13, 3);
            $table->unsignedTinyInteger('hours_per_week');
            $table->unsignedSmallInteger('total_proposals');
            $table->unsignedSmallInteger('total_invitation_sent');
            $table->unsignedTinyInteger('average_rating');
            $table->decimal('money_spent', 13, 3);
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
        Schema::dropIfExists('jobs');
    }
}
