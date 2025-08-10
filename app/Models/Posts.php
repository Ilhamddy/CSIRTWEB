<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Posts extends Model
{
    use HasFactory;

    public $incrementing = false; // karena bukan auto-increment
    protected $keyType = 'string';

    protected $fillable = [
        'title',
        'content',
        'slug',
        'type',
        // 'category_id',
        'user_id',
        'image',
        'source',
        'is_published',
        'published_at',
        'tags',
        'views',
        'likes',
        'comments_count',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'featured_image',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
