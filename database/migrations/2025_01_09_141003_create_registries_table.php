<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registries', function (Blueprint $table) {
            $table->id(); // ID único
            $table->string("dni")->unique(); // DNI
            $table->string("firstname"); // Apellido paterno
            $table->string("lastname"); // Apellido materno
            $table->string("names"); // Nombres
            $table->string("district")->nullable(); // Distrito
            $table->string("ipress")->nullable(); // IPRESS
            $table->string("network")->nullable(); // Eje de red y microred
            $table->integer("age")->nullable(); // Edad
            $table->string("provenance")->nullable(); // Comunidad/Barrio
            $table->string("address")->nullable(); // Dirección
            $table->string("cellphone", 20)->nullable(); // Celular
            $table->date("fur")->nullable(); // Fecha de última regla (FUR)
            $table->date("fpp")->nullable(); // Fecha probable de parto (FPP)
            $table->integer("gestation_weeks")->nullable(); // Edad gestacional
            $table->string("risk_factor")->nullable(); // Factor de riesgo
            $table->string("hemoglobine")->nullable(); // Color
            $table->string("color")->nullable(); // Color
            $table->string("cpn")->nullable(); // Color
            $table->string("anemia")->nullable(); // 
            $table->string("parity")->nullable(); //
            $table->date("date_part")->nullable(); // 
            $table->date("date_cite")->nullable(); // 
            $table->text("observations")->nullable(); // Observaciones
            $table->timestamps(); // Timestamps automáticos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registries');
    }
};
