<?php

use App\Enums\WithholdingType;
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
        Schema::create('withholdings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['RETENCION EN RENTA',
                'RETENCION EN ICA', 'RETENCION EN IVA',
                'RETENCION EN TIMBRE NACIONAL'
            ]);
            $table->float('percent');
            $table->float('amount');
            $table->foreignId('company_id')->constrained()->onDeleteCascade();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withholdings');
    }
};
