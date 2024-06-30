<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'divisi', 'aksi','detail', 'assigned_to'
    ];
    public function assignedKaryawan()
    {
        return $this->belongsTo(Karyawan::class, 'assigned_to', 'id');
    }
}
