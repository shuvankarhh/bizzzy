<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('payment_type', false, true);
            $table->double('price', 13, 3);
            $table->tinyInteger('service_charge_type', false, true);
            $table->double('service_charge', 13, 3);
            $table->double('paid_amount', 13, 3)->default(0);
            $table->tinyInteger('is_fully_paid', false, true)->default(0);
            $table->dateTime('end_date')->nullable();
            $table->tinyInteger('contract_status', false, true);
            $table->dateTime('contract_confirmation_date');
            $table->bigInteger('created_by_user', false, true)->nullable();
            $table->bigInteger('created_by_staff', false, true)->nullable();
            $table->tinyInteger('is_confirmed_by_client', false, true);
            $table->tinyInteger('is_confirmed_by_freelancer', false, true);
            $table->bigInteger('canceled_by_user', false, true)->nullable();
            $table->tinyInteger('client_private_feedback_rating', false, true)->nullable();
            $table->tinyInteger('freelancer_private_feedback_rating', false, true)->nullable();
            $table->tinyInteger('client_public_feedback_rating', false, true)->nullable();
            $table->tinyInteger('freelancer_public_feedback_rating', false, true)->nullable();
            $table->string('client_public_feedback_comment')->nullable();
            $table->string('freelancer_public_feedback_comment')->nullable();
            $table->bigInteger('job_id', false, true)->nullable();
            $table->bigInteger('freelancer_id', false, true)->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
