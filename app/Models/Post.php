<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    public function upvotes(): HasMany
    {
        return $this->hasMany(Upvote::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
