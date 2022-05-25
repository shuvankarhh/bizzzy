<?php

use App\Models\Contract;
use App\Models\ContractMilestone;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPendingBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_pending_balances', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Contract::class);
            $table->foreignIdFor(ContractMilestone::class)->nullable();
            $table->foreignIdFor(User::class);
            $table->tinyInteger('status')->unsigned();
            $table->double('amount',13,3);
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
        Schema::dropIfExists('user_pending_balances');
    }
}
