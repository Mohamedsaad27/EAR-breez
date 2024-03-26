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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')
                ->references('id')
                ->on('sellers')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('seller_name');
            $table->string('seller_email');
            $table->string('subject');
            $table->text('message');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
