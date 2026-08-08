<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'priority',
        'user_id',
        'category_id',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function getPriorityLabelAttribute(): string
    {
        return match($this->priority) {
            1 => '低',
            2 => '中',
            default=> '高',
        };
    }
}
