<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    protected $fillable = ['user_id','name','wide','iot','address','information','thumb'];

    public function comodity()
    {
        return $this->belongsTo(Comodity::class, 'comodity_id');
    }

    use HasFactory;
}
