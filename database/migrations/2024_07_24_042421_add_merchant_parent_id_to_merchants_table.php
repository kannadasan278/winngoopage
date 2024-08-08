<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMerchantParentIdToMerchantsTable extends Migration
{
    public function up()
    {
        Schema::table('merchants', function (Blueprint $table) {
            $table->unsignedBigInteger('merchant_parent_id')->nullable()->after('id');
            $table->foreign('merchant_parent_id')->references('id')->on('merchants')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('merchants', function (Blueprint $table) {
            $table->dropForeign(['merchant_parent_id']);
            $table->dropColumn('merchant_parent_id');
        });
    }
}
