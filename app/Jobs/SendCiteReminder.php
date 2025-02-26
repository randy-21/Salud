<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\Registry;
use App\Mail\RegistryCreated;

class SendCiteReminder implements ShouldQueue // 👈 IMPORTANTE: Debe implementar ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct() {}

    public function handle()
    {
        // 📅 Obtener citas que vencen hoy
        $today = Carbon::now('America/Lima')->toDateString();
        $citas = Registry::whereDate('date_cite', $today)->get();

        foreach ($citas as $cita) {
            Mail::to($cita->email ?: "randy21_10@hotmail.com")
                ->cc("randy21_10@hotmail.com")
                ->cc("logicainformatica18@gmail.com")
                ->queue(new RegistryCreated($cita)); // 👈 Usa `queue()` en lugar de `send()`
        }
    }
}
