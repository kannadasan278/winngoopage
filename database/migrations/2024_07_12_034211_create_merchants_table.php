<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('merchants', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('address_line_1');
        $table->string('address_line_2')->nullable();
        $table->string('address_line_3')->nullable();
        $table->string('city');
        $table->string('post_code');
        $table->string('country');
        $table->string('phone_number');
        $table->string('referral_code')->nullable();
        $table->string('business_name');
        $table->string('trading_name')->nullable();
        $table->json('category_id')->change();
        $table->boolean('is_franchise')->default(false);
        $table->longText('business_description');
        $table->integer('trading_years')->nullable();
        $table->string('discountType')->nullable();
        $table->float('discount_percentage')->nullable();
        $table->text('terms_and_conditions')->nullable();
        $table->string('website_link')->nullable();
        $table->string('image');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
};
