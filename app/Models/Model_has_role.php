<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Model_has_role extends Model
{
    protected $fillable = ['model_id','model_type','role_id'];
}
