<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comodity extends Model
{
    protected $table = 'comodities';
    protected $fillable = ['name', 'latin', 'temp', 'ph', 'planting_distance', 'fertilizer_dose', 'potential_results'];
    use HasFactory;
}
