<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Lang;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{

    public $token;


    public static $createUrlCallback;


    public static $toMailCallback;


    public function __construct($token)
    {
        $this->token = $token;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return $this->buildMailMessage($this->resetUrl($notifiable));
    }


    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject(Lang::get('Restablecer contraseña'))
            ->line(Lang::get('con este email que recibiste podras restablecer tu contraseña'))
            ->action(Lang::get('Reestablecer Contrasena'), $url)
            ->line(Lang::get('Este enlace de restablecimiento de contraseña caducará en :count minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('Si no solicitó un restablecimiento de contraseña, no se requiere ninguna otra acción.'));
    }


    protected function resetUrl($notifiable)
    {
        if (static::$createUrlCallback) {
            return call_user_func(static::$createUrlCallback, $notifiable, $this->token);
        }

        return url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
    }


    public static function createUrlUsing($callback)
    {
        static::$createUrlCallback = $callback;
    }


    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
