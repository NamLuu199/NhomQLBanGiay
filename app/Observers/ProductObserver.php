<?php

namespace App\Observers;

use App\Product;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Product  $Product
     * @return void
     */
    public function created(Product $Product)
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Product  $Product
     * @return void
     */
    public function updated(Product $Product)
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Product  $Product
     * @return void
     */
    public function deleted(Product $Product)
    {
        //
    }
    public function deleting(Product $Product)
    {

            $Product->images()->delete();

    }
    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Product  $Product
     * @return void
     */
    public function restored(Product $Product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Product  $Product
     * @return void
     */
    public function forceDeleted(Product $Product)
    {
        //
    }
}
