<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanans';
    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'description',
        'icon',
        'link',
        'is_active',
        'user_id',
        'order',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
