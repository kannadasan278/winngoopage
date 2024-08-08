<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaglinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taglines', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('merchant_id') // Foreign key reference to merchants table
                  ->constrained('merchants')
                  ->onDelete('cascade'); // If a merchant is deleted, its associated taglines will also be deleted
            $table->string('tagline'); // The tagline text
            $table->enum('status', ['active', 'inactive'])->default('inactive'); // Status of the tagline
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taglines');
    }
}
