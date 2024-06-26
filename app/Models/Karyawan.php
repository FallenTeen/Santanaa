<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'email', 'divisi'];
    public function user()
    {
        return $this->belongsTo(User::class); // Sesuaikan dengan nama model User Anda jika berbeda
    }
}
