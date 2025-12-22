<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oss_rba_proyek_laps extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function scopeFilter($query, array $filters)
    {
        if ($filters['idproyek'] ?? false) {
            $query->where('id_proyek', $filters['idproyek']);
        }
    }
}
