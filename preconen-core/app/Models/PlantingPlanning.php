<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantingPlanning extends Model
{
    protected $fillable = ['user_id','comodity_id','land_id','start_from','end_at'];


    use HasFactory;
}
