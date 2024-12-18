<?php

namespace App\Observers;

use App\Models\Curriculum;

class StatusCurriculoObserver
{
    /**
     * Handle the Curriculum "created" event.
     */
    public function created(Curriculum $curriculum): void
    {
        //
    }

    /**
     * Handle the Curriculum "updated" event.
     */
    public function updated(Curriculum $curriculum): void
    {
        //
    }

    /**
     * Handle the Curriculum "deleted" event.
     */
    public function deleted(Curriculum $curriculum): void
    {
        //
    }

    /**
     * Handle the Curriculum "restored" event.
     */
    public function restored(Curriculum $curriculum): void
    {
        //
    }

    /**
     * Handle the Curriculum "force deleted" event.
     */
    public function forceDeleted(Curriculum $curriculum): void
    {
        //
    }
}
