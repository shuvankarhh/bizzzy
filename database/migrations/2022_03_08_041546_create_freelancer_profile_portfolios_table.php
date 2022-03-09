<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerProfilePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_profile_portfolios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('freelancer_profile_id');
            $table->unsignedBigInteger('portfolio_id')->nullable();
            $table->unsignedBigInteger('contract_id')->nullable();
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
        Schema::dropIfExists('freelancer_profile_portfolios');
    }
}
