<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Registry;
use App\Mail\RegistryCreated;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Bus;
class EnviarCitasVencidas extends Command
{
    protected $signature = 'citas:enviar';
    protected $description = 'Envía correos electrónicos para las citas que vencen hoy';

    public function handle()
    {
        $today = Carbon::now('America/Lima');

        $registrys = Registry::whereBetween('date_cite', [
                $today->copy()->startOfDay(), // 📅 00:00:00 del día actual
                $today->copy()->endOfDay()    // 📅 23:59:59 del día actual
            ])
            ->get();
            Bus::batch($registrys->map(function ($registry) {
                return function () use ($registry) {
                    $emailDestino = optional($registry->user)->email ?? "randy21_10@hotmail.com";

                    Mail::send('emails.registry_notify_day', ['registry' => $registry], function ($message) use ($emailDestino) {
                        $message->from('soporte@anthonycode.com', 'Indicadores de Salud')
                                ->to($emailDestino)
                                ->bcc("logicainformatica18@gmail.com")
                                ->subject('Día de Cita - Hoy');
                    });
                };
            }))->dispatch();

            $this->info('Correos en proceso.');
    }
}
