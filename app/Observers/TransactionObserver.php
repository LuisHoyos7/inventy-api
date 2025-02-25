<?php

namespace App\Observers;

use App\Enums\InventoryMovementType;
use App\Enums\TransactionStatus;
use App\Enums\TransactionsType;
use App\Models\Transaction;

class TransactionObserver
{
    /**
     * Handle the Transaction "updated" event.
     */
    public function updated(Transaction $transaction): void
    {
        if ($transaction->status === TransactionStatus::COMPLETED) {
            foreach ($transaction->items as $item) {
                $transaction->inventoryMovements()->create([
                    'type' => $transaction->type === TransactionsType::SALE ?
                        InventoryMovementType::OUT :
                        InventoryMovementType::IN,
                    'item_id' => $item->id,
                    'quantity' => $item->pivot->quantity,
                ]);
            }

            foreach ($transaction->items as $item) {
                $item->adjustStock(
                    $transaction->type === TransactionsType::SALE ?
                        -$item->pivot->quantity :
                        $item->pivot->quantity
                );
            }
        }
    }
}
