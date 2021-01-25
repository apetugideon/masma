<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) { 
            // client_token, receipt
            // With client_token, get systen_os, // device_id, app_id
            // With receipt and systen_os, get status, expiry_date from iOS or google store
            $table->id();
            $table->string('client_token');
            $table->string('receipt');
            $table->char('status'); // new, renewed,
            $table->dateTime('purchase_date');
            $table->dateTime('expiry_date'); // Ensure UTC - 6 is converted to date('Y-m-d H:s:i')
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
        Schema::dropIfExists('purchases');
    }
}
