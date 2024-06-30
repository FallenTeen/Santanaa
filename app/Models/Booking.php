<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'guest_id',
        'jumlah_tamu',
        'kamar_id',
        'dp_amount',
    ];
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}
