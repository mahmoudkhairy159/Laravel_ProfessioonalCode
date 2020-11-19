<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\OfferViewer;
class OfferIncreaseViews
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


/**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OfferViewer $event)
    {
        $this->increaseOfferViewCount($event->offer);
    }

    private function increaseOfferViewCount($offer){

        $offer->viewCount= $offer->viewCount+1;
        $offer->save();

    }



}
