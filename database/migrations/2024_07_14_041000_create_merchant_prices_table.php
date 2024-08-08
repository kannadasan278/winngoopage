<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantPricesTable extends Migration
{
    public function up()
    {
        Schema::create('merchant_prices', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('range')->nullable();
            $table->text('price');
            $table->text('vat');
            $table->text('total_price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('merchant_prices');
    }
}

