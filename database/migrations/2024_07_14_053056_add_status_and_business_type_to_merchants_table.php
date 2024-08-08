<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusAndBusinessTypeToMerchantsTable extends Migration
{
    public function up()
    {
        Schema::table('merchants', function (Blueprint $table) {
            $table->enum('status', ['approved', 'rejected', 'hold', 'pending'])->default('pending');
            $table->foreignId('business_type_id')->constrained('business_types');
        });
    }

    public function down()
    {
        Schema::table('merchants', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropForeign(['business_type_id']);
            $table->dropColumn('business_type_id');
        });
    }
}
