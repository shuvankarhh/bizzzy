<?php

use App\Models\Contract;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Contract::class);
            $table->foreignIdFor(User::class);
            $table->tinyInteger('feedback_one')->unsigned();
            $table->tinyInteger('feedback_two')->unsigned();
            $table->tinyInteger('feedback_three')->unsigned();
            $table->tinyInteger('feedback_four')->unsigned();
            $table->tinyInteger('feedback_five')->unsigned();
            $table->tinyInteger('feedback_six')->unsigned();
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
        Schema::dropIfExists('contract_feedback');
    }
}
