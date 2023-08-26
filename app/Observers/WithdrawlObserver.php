<?php

namespace App\Observers;

use App\Models\Withdrawl;
use Illuminate\Support\Str;
class WithdrawlObserver
{
    /**
     * Handle the Withdrawl "created" event.
     *
     * @param  \App\Models\Withdrawl  $withdrawl
     * @return void
     */
    public function created(Withdrawl $withdrawl)
    {
        //
        $withdrawl->uuid = Str::uuid();
        $withdrawl->save();
    }

    /**
     * Handle the Withdrawl "updated" event.
     *
     * @param  \App\Models\Withdrawl  $withdrawl
     * @return void
     */
    public function updated(Withdrawl $withdrawl)
    {
        //
    }

    /**
     * Handle the Withdrawl "deleted" event.
     *
     * @param  \App\Models\Withdrawl  $withdrawl
     * @return void
     */
    public function deleted(Withdrawl $withdrawl)
    {
        //
    }

    /**
     * Handle the Withdrawl "restored" event.
     *
     * @param  \App\Models\Withdrawl  $withdrawl
     * @return void
     */
    public function restored(Withdrawl $withdrawl)
    {
        //
    }

    /**
     * Handle the Withdrawl "force deleted" event.
     *
     * @param  \App\Models\Withdrawl  $withdrawl
     * @return void
     */
    public function forceDeleted(Withdrawl $withdrawl)
    {
        //
    }
}
