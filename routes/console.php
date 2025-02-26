<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;
use App\Jobs\SendCiteReminder;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// 📅 Registrar el Job para ejecutarse dos veces al día (cada 12 horas)
app()->booted(function () {
    $schedule = app(Schedule::class);
    $schedule->job(new SendCiteReminder())->twiceDaily(8, 20); // Ejecuta a las 8 AM y 8 PM
});
