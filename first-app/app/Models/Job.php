<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function scopeOnline($query) {
        return $query->where('status', 1); // fonction qui retourne les jobs avec le status 1, pour définir qu'il sont en ligne
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
