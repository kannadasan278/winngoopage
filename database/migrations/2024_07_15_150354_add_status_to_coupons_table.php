<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up()
{
    Schema::table('coupons', function (Blueprint $table) {
        $table->enum('status', ['active', 'inactive'])->default('active')->after('expiry_date');
        // Alternatively, you can use a string field:
        // $table->string('status')->default('active');
    });
}

public function down()
{
    Schema::table('coupons', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}
};
