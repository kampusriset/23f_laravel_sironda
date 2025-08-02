<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPetugas extends Model
{
    use HasFactory;

    protected $guarded = ['$id'];
    
    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }
}

