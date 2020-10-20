<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KrononUser extends Model
{
    use HasFactory;
    // protected $table = "kronon_user";

    public function scopeMailEqual($query, $mail)
    {
        return $query->where('mail', $mail);
    }
}
