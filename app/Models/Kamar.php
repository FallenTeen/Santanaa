<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe_kamar_id',
        'status_kamar_id',
        'nomor',
        'lantai',
        'kapasitas',
        'harga',
        'deskripsi_singkat',
    ];

    public function tipeKamar(){
        return $this->belongsTo(TipeKamar::class);
    }
    public function statusKamar(){
        return $this->belongsTo(StatusKamar::class);
    }
   
}
