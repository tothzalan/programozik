<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'url', 'project_id']; 

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
