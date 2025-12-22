<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oss_rba_izins extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'izin';
    public function ossrbanibizin()
    {
        return $this->belongsTo(Oss_rba_nib::class, 'nib');
    }
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
