<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSuccessfullyCompletedToFreelancerProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('freelancer_profiles', function (Blueprint $table) {
            $table->smallInteger('successfully_completed')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('freelancer_profiles', function (Blueprint $table) {
            $table->dropColumn('successfully_completed');
        });
    }
}
