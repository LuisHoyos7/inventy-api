<?php

use App\Enums\TransactionStatus;
use App\Enums\TransactionsType;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', array_column(TransactionsType::cases(), 'value'));
            $table->date('date');
            $table->decimal('total', 20, 2)->default(0);
            $table->enum('status', array_column(TransactionStatus::cases(), 'value'))
                ->default(TransactionStatus::DRAFT->value);
            $table->foreignId('contact_id')->constrained()->cascadeOnDelete();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
