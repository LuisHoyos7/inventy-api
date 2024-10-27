<?php

namespace App\Observers;

use App\Enums\InventoryMovementType;
use App\Enums\TransactionStatus;
use App\Enums\TransactionsType;
use App\Models\InventoryMovement;
use App\Models\Transaction;

class TransactionObserver
{
    /**
     * Handle the Transaction "created" event.
     */
    public function created(Transaction $transaction): void
    {
        //
    }

    /**
     * Handle the Transaction "updated" event.
     */
    public function updated(Transaction $transaction): void
    {
        if($transaction->status === TransactionStatus::COMPLETED){
            foreach ($transaction->items as $item) {
                $transaction->inventoryMovements()->create([
                    'type' => $transaction->type === TransactionsType::SALE ? 
                        InventoryMovementType::OUT : 
                        InventoryMovementType::IN,
    
                    'item_id' => $item->id,  
                    'quantity' => $item->pivot->quantity, 
                ]);
            }
        }
    }

    /**
     * Handle the Transaction "deleted" event.
     */
    public function deleted(Transaction $transaction): void
    {
        //
    }

    /**
     * Handle the Transaction "restored" event.
     */
    public function restored(Transaction $transaction): void
    {
        //
    }

    /**
     * Handle the Transaction "force deleted" event.
     */
    public function forceDeleted(Transaction $transaction): void
    {
        //
    }
}