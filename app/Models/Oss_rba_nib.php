<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oss_rba_nib extends Model
{
    use HasFactory;
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nib', '=',  $search);
        });
    }
    public function usernib()
    {
        return $this->belongsTo(Usernibs::class, 'nib');
    }

    public function ossrbaproyek()
    {
        return $this->hasMany(Oss_rba_proyeks::class, 'nib');
    }
    public function ossrbaizin()
    {
        return $this->hasMany(Oss_rba_izins::class, 'nib');
    }
}
