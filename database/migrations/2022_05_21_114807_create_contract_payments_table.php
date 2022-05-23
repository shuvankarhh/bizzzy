<?php

use App\Models\Contract;
use App\Models\PaymentMethod;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Contract::class);
            $table->string('transaction_id');
            $table->foreignIdFor(PaymentMethod::class);
            $table->double('money_amount', 13,3);
            $table->tinyInteger('payment_status')->unsigned();
            $table->tinyInteger('payment_type')->unsigned();
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
        Schema::dropIfExists('contract_payments');
    }
}
