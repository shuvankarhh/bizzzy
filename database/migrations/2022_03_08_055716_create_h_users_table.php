<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('h_id');

            $table->string('name');
            $table->string('username');
            $table->unsignedBigInteger('account_phone_id')->nullable();
            $table->unsignedBigInteger('account_email_id')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->unsignedTinyInteger('acting_status');

            $table->unsignedBigInteger('h_created_by_user')->nullable();
            $table->unsignedBigInteger('h_created_by_staff')->nullable();
            $table->timestamp('h_created_at')->nullable();
            $table->unsignedTinyInteger('h_crud_operation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('h_users');
    }
}
