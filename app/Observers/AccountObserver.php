<?php

namespace App\Observers;

use App\Models\account;
use App\Models\consolidated;
use Illuminate\Support\Facades\Auth;

class AccountObserver
{
    /**
     * Handle the account "created" event.
     *
     * @param  \App\Models\account  $account
     * @return void
     */
    public function created(account $account)
    {
        consolidated::create([
            'user_id'=>$account->user_id,
            'account_id'=>$account->id,
            'value'=>0
        ]);
    }

    /**
     * Handle the account "updated" event.
     *
     * @param  \App\Models\account  $account
     * @return void
     */
    public function updated(account $account)
    {
        //
    }

    /**
     * Handle the account "deleted" event.
     *
     * @param  \App\Models\account  $account
     * @return void
     */
    public function deleted(account $account)
    {
        //
    }

    /**
     * Handle the account "restored" event.
     *
     * @param  \App\Models\account  $account
     * @return void
     */
    public function restored(account $account)
    {
        //
    }

    /**
     * Handle the account "force deleted" event.
     *
     * @param  \App\Models\account  $account
     * @return void
     */
    public function forceDeleted(account $account)
    {
        //
    }
}
