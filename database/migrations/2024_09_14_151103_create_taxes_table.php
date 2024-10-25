<?php

use App\Enums\TaxType;
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
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['IMPUESTO SOBRE LA RENTA', 
                'IMPUESTO SOBRE EL PATRIMONIO', 'IMPUESTO EN INDUSTRIA Y COMERCIO',
                'IMPUESTO PREDIAL UNIFICADO', 'IMPUESTO SOBRE LAS VENTAS IVA',
                'IMPUESTO SOBRE GANANCIA OCASIONAL', 'IMPUESTO NACIONAL AL CONSUMO'
            ]);
            $table->float('percent');
            $table->float('amount');
            $table->foreignId('company_id')
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
        Schema::dropIfExists('taxes');
    }
};
