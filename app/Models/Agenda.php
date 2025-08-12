<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'category_id',
        'user_id',
    ];

    /**
     * Get the user that owns the agenda.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the formatted start date.
     */
    public function getFormattedStartDateAttribute()
    {
        return $this->start_date->format('d M Y H:i');
    }

    /**
     * Get the formatted end date.
     */
    public function getFormattedEndDateAttribute()
    {
        return $this->end_date ? $this->end_date->format('d M Y H:i') : null;
    }
}
