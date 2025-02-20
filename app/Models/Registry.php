<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Registry extends Model
{
    /** @use HasFactory<\Database\Factories\RegistryFactory> */
    use HasFactory;
    public function risk_factors()
    {
        return $this->belongsToMany(
            Risk_factor::class, // Modelo relacionado
            'risk_factor_details', // Tabla intermedia
            'registry_id', // Clave foránea en la tabla pivote que referencia a `Registry`
            'risk_factor_id' // Clave foránea en la tabla pivote que referencia a `Risk_factor`
        );
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'created_by','id');

    }
}
