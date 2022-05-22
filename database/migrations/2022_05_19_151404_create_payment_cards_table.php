<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('card_number', 30);
            $table->string('card_holder_name');
            $table->tinyInteger('expires_on_mm')->unsigned();
            $table->tinyInteger('expires_on_yy')->unsigned();
            $table->integer('security_number');
            $table->string('address')->nullable();
            $table->tinyInteger('status')->unsigned();
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
        Schema::dropIfExists('payment_cards');
    }
}
