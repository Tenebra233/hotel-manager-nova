<?php

namespace App\Observers;

use App\Fattura;

class FatturaObserver
{
    /**
     * Handle the fattura "created" event.
     *
     * @param \App\Fattura $fattura
     * @return void
     */
    public function created(Fattura $fattura)
    {
        $fattura->newQuery()->where('id', '=', $fattura->id)->update(array("created_at" => $fattura->data));
        $fattura->newQuery()->where('id', '=', $fattura->id)->update(array("updated_at" => $fattura->data));
    }

    /**
     * Handle the fattura "updated" event.
     *
     * @param \App\Fattura $fattura
     * @return void
     */
    public function updated(Fattura $fattura)
    {
        $fattura->newQuery()->where('id', '=', $fattura->id)->update(array("created_at" => $fattura->data));
        $fattura->newQuery()->where('id', '=', $fattura->id)->update(array("updated_at" => $fattura->data));
    }

    /**
     * Handle the fattura "deleted" event.
     *
     * @param \App\Fattura $fattura
     * @return void
     */
    public function deleted(Fattura $fattura)
    {
        //
    }

    /**
     * Handle the fattura "restored" event.
     *
     * @param \App\Fattura $fattura
     * @return void
     */
    public function restored(Fattura $fattura)
    {
        //
    }

    /**
     * Handle the fattura "force deleted" event.
     *
     * @param \App\Fattura $fattura
     * @return void
     */
    public function forceDeleted(Fattura $fattura)
    {
        //
    }
}
