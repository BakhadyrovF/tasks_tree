<?php

namespace App\Models;

use App\Traits\TaskTree;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Task extends Model
{
    use HasFactory, TaskTree;

    protected $fillable = [
        'title',
        'body',
        'is_completed',
        'parent_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
