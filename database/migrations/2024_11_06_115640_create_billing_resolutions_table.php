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
        Schema::create('billing_resolutions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', [
                'FACTURA',
                'NOTA_CREDITO',
                'NOTA_DEBITO',
                'NOMINA',
                'NOTA_REEMPLAZO',
                'NOTA_ELIMINACION',
                'DOCUMENTO_SOPORTE',
                'NOTA_DOCUMENTO_SOPORTE',
            ])->default('FACTURA');
            $table->string('prefix', 20);
            $table->string('code', 20);
            $table->bigInteger('consecutive_start');
            $table->bigInteger('consecutive_end')->nullable();
            $table->bigInteger('current_consecutive');
            $table->date('due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_resolutions');
    }
};
