<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'description', 'link'];

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
