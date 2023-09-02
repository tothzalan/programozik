<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['project_id', 'user_id', 'valid'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
