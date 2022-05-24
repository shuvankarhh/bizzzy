<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUserBalances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_balances', function (Blueprint $table) {
            $table->double('pending', 13,3)->default(0);
            $table->double('in_review', 13,3)->default(0);
            $table->double('in_progress', 13,3)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_balances', function (Blueprint $table) {
            $table->dropColumn('pending');
            $table->dropColumn('in_review');
            $table->dropColumn('in_progress');
        });
    }
}
