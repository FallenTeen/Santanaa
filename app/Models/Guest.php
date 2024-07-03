<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $table = 'guests';
    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'tanggal_lahir',
        'nomor_ktp',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function booking(){
        return $this->hasMany(Booking::class);
    }
}
