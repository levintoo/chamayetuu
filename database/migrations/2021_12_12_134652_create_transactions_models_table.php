<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions_models', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('type',50)->comment('debit or credit');
            $table->unsignedInteger('amount');
            $table->string('purpose',50)->comment('saving or shares or loan or utility');
            $table->string('source',50)->comment('paypal or mpesa');
            $table->string('transaction_id',256);
            $table->dateTime('transacted_at');
            $table->unsignedInteger('status')->comment('0 for waiting, 1 for sucessful 2 for failed 3for cancelled 4 for Reversed');
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
        Schema::dropIfExists('transactions_models');
    }
}
