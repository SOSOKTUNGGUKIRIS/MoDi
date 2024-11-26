<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lks extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'modul_id'];

    // Relasi dengan model Modul
    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }
}
