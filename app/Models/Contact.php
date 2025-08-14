<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'phone',
        'fax',
        'address',
        'description',
        'latitude',
        'longitude',
        'social_media',
        'whatsapp',
        'telegram',
        'instagram',
        'facebook',
        'twitter',
        'youtube',
        'tiktok',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
