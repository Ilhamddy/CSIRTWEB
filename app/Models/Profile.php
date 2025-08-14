<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'visi',
        'misi',
        'logo',
        'sejarah',
        'struktur_organisasi',
        'user_id',
    ];
}
