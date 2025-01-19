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
        Schema::create('risk_factor_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('risk_factor_id')->unsigned();
            $table->foreign('risk_factor_id')->references('id')->on('risk_factors');
            $table->bigInteger('registry_id')->unsigned();
            $table->foreign('registry_id')->references('id')->on('registries');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk_factor_details');
    }
};
