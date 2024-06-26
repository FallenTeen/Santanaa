<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKamar extends Model
{
    protected $fillable = [
        'kode_status',
        'status',
        'penjelasan_status',
    ];
    public function kamar(){
        return $this->hasMany(Kamar::class);
    }
}
