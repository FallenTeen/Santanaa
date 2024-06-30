<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
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
}
