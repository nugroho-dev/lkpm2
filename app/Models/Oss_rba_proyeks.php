<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oss_rba_proyeks extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $connection = 'mysql2';
    protected $table = 'proyek';
    public function ossrbaproyeklaps()
    {
        return $this->hasMany(Oss_rba_proyek_laps::class);
    }
    public function ossrbanibproyek()
    {
        return $this->belongsTo(Oss_rba_nib::class, 'nib');
    }
}
