<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HolaMundo extends Command
{
    // Nombre del comando que usarás en la terminal
    protected $signature = 'saludo:hola';

    // Descripción del comando
    protected $description = 'Muestra un mensaje de Hola Mundo';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Imprimir "Hola Mundo"
        $this->info('¡Hola Mundo desde Artisan!');
    }
}
