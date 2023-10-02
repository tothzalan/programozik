<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'description', 'link'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'desc');
    }

    public function issues(): HasMany
    {
        return $this->hasMany(Issue::class);
    }
}
