<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;
class ChangePassword extends Notification
{
    use Queueable;
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['mail'];
    }
    /**
     * Create a new notification instance.
     */
 

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
   

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->greeting('Hola, ' . $notifiable->name)
        ->subject(Lang::get('Indicadores de Salud : Su contraseña se ha modificado'))
        ->line(Lang::get('Su contraseña se ha modificado'))
        ->line(Lang::get('Si tu no realizaste el cambio, puedes restaurar tu contraseña desde :'))
        ->action(Lang::get('Cambiar contraseña'), url(config('app.url')."/password/reset"))
        ->salutation('Saludos, El Equipo de Indicadores de Salud');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
