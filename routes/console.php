<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Artisan;
use App\Jobs\SendCiteReminder;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// 📅 Registrar el Job para ejecutarse dos veces al día (8 AM y 8 PM)
app()->booted(function () {
    $schedule = app(Schedule::class);
    $schedule->job(new SendCiteReminder())->twiceDaily(8, 20);
});
