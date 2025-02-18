<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Registry extends Model
{
    /** @use HasFactory<\Database\Factories\RegistryFactory> */
    use HasFactory;
    public function risk_factors(){
        return $this->belongsToMany('App\Models\Risk_factor', 'risk_factor_details','registry_id');
        
    }
    public function user(){
        return $this->belongsTo('App\Models\User', 'created_by','id');
        
    }
}
