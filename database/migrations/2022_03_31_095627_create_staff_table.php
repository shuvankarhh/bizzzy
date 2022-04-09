<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_name')->unique();
            $table->foreignId('account_phone_id')->nullable();
            $table->foreignId('account_email_id')->nullable();
            $table->string('password')->nullable();
            $table->smallInteger('staff_role_id')->nullable();
            $table->string('photo')->nullable();
            $table->tinyInteger('acting_status')->unsigned();
            $table->rememberToken()->nullable();
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
        Schema::dropColumns();
        Schema::dropIfExists('staff');
    }
}