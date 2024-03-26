<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('business_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->string('business_name');
            $table->string('business_address');
            $table->string('city');
            $table->string('postal_code');
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('sellers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_information');
    }
};
