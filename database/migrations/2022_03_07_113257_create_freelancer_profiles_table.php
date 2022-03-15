<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedTinyInteger('availability_badge')->nullable();
            $table->unsignedTinyInteger('profile_visibility')->nullable();
            $table->string('professional_title')->nullable();
            $table->string('description', 5000)->nullable();
            $table->unsignedTinyInteger('project_time_preference')->nullable();
            $table->unsignedTinyInteger('experience_level')->nullable();
            $table->decimal('price_per_hour', 8, 3)->nullable();
            $table->unsignedTinyInteger('hours_per_week')->nullable();
            $table->decimal('total_earnings', 13, 3)->nullable();
            $table->unsignedSmallInteger('total_jobs');
            $table->unsignedInteger('total_hours');
            $table->unsignedTinyInteger('job_success_percentage');
            $table->unsignedTinyInteger('average_rating');
            $table->unsignedTinyInteger('is_top_rated');
            $table->unsignedTinyInteger('profile_completion_percentage');
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
        Schema::dropIfExists('freelancer_profiles');
    }
}
