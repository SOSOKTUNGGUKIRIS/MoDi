<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relasi dengan model Lks
    public function lks()
    {
        return $this->hasMany(Lks::class);
    }
}