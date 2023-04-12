<?php

namespace App\Observers;

use App\Mail\ContractSent;
use App\Models\Contract;
use http\Message;
use Illuminate\Support\Facades\Mail;

class ContractObserver
{
    /**
     * Handle the Contract "created" event.
     */
    public function created(Contract $contract): void
    {
            Mail::to($contract->event->customer->mail)->send(new ContractSent($contract));
            $contract->sent = true;
            $contract->sent_at = date('Y-m-d H:i:s');
            $contract->signed_url = route('contract.view', $contract->id);
            $contract->save();

    }

    /**
     * Handle the Contract "updated" event.
     */
    public function updated(Contract $contract): void
    {
        //
    }

    /**
     * Handle the Contract "deleted" event.
     */
    public function deleted(Contract $contract): void
    {
        //
    }

    /**
     * Handle the Contract "restored" event.
     */
    public function restored(Contract $contract): void
    {
        //
    }

    /**
     * Handle the Contract "force deleted" event.
     */
    public function forceDeleted(Contract $contract): void
    {
        //
    }
}
