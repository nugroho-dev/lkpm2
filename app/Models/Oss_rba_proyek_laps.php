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
        $query->when(
            $filters['idproyek'] ?? false,
            function ($query, $idproyek) {
                return $query->whereHas(
                    'ossrbaproyeks',

                    function ($query) use ($idproyek) {
                        $query->where('id_proyek', $idproyek);
                    }
                );
            }
        );
    }
    public function ossrbaproyeks()
    {
        return $this->belongsTo(Oss_rba_proyeks::class, 'id_proyek', 'id_proyek');
    }
}
