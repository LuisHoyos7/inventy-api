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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identification_type_id')
                ->nullable()
                ->constrained()
                ->onDeleteCascade();
            $table->string('identification')->nullable();
            $table->enum('person_type', ['Natural', 'Juridica'])
                ->nullable();
            $table->string('name');
            $table->string('trade_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('city_id')
                ->nullable()
                ->constrained()
                ->onDeleteCascade();
            $table->foreignId('country_id')
                ->nullable()
                ->constrained()
                ->onDeleteCascade();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
