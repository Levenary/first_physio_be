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
        Schema::create('branchs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lat');
            $table->string('lng');
            $table->string('phone');
            $table->text('address');
            $table->json('operation_json');
            $table->boolean('is_active')->default(true); // Added 'is_active' field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branchs');
    }
};
