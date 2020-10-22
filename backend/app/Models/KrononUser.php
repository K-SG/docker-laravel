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

    public function scopeLoginCheck($query, $mail, $password)
    {
        return $query->where('mail', $mail)->where('password', $password);
    }
}
