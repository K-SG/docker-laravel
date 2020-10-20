<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KrononUser extends Model
{
    use HasFactory;

    public function scopeSelectByMail($query, $mail)
    {
        return $query->where('mail', $mail);
    }
}
