<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description');
            $table->integer('iscard')->comment('1 É cartão 2 Não é cartão');
            $table->integer('card_number');
            $table->decimal('balance',8,2)->nullable();
            $table->decimal('limit',8,2)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->integer('invoice_close');
            $table->integer('invoice_expiration');

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('accounts');
    }
}
