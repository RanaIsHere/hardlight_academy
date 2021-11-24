<?php

namespace App\Observers;

use App\Models\ActionLogs;
use App\Models\Assignments;

class Logging
{
    /**
     * Handle the Assignments "created" event.
     *
     * @param  \App\Models\Assignments  $assignments
     * @return void
     */
    public function created(Assignments $assignments)
    {
        $action_logs = new ActionLogs;

        $action_logs->action = 'INSERT';

        $action_logs->saveOrFail();
    }

    /**
     * Handle the Assignments "updated" event.
     *
     * @param  \App\Models\Assignments  $assignments
     * @return void
     */
    public function updated(Assignments $assignments)
    {
        $action_logs = new ActionLogs;

        $action_logs->action = 'UPDATE';

        $action_logs->saveOrFail();
    }

    /**
     * Handle the Assignments "deleted" event.
     *
     * @param  \App\Models\Assignments  $assignments
     * @return void
     */
    public function deleted(Assignments $assignments)
    {
        $action_logs = new ActionLogs;

        $action_logs->action = 'DELETE';

        $action_logs->saveOrFail();
    }

    /**
     * Handle the Assignments "restored" event.
     *
     * @param  \App\Models\Assignments  $assignments
     * @return void
     */
    public function restored(Assignments $assignments)
    {
        //
    }

    /**
     * Handle the Assignments "force deleted" event.
     *
     * @param  \App\Models\Assignments  $assignments
     * @return void
     */
    public function forceDeleted(Assignments $assignments)
    {
        //
    }
}
