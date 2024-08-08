<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('merchant_id');
            $table->string('day_of_week');
            $table->string('status')->default('Open');
            $table->text('opening_time')->nullable();
            $table->text('closing_time')->nullable();
            $table->string('day_type')->default('Weekday');
            $table->integer('day_order')->default(1);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant_hours');
    }
}
