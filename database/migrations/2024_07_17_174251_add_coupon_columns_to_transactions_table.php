<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCouponColumnsToTransactionsTable extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('coupon_type')->nullable();
            $table->decimal('coupon_amount', 8, 2)->nullable();
            $table->decimal('coupon_percentage', 5, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('coupon_type');
            $table->dropColumn('coupon_amount');
            $table->dropColumn('coupon_percentage');
        });
    }
}

