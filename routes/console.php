<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;


// Comando per visualizzare una citazione ispiratrice

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
