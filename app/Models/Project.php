<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'client',
        'completed_at',
        'description',
        'content'
    ];

    public array $translatable = [
        'name',
        'slug',
        'description',
        'content',
    ];

    public function media(): BelongsToMany
    {
        return $this->belongsToMany(Media::class)->withPivot('theme_availability');
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class)->withPivot('sort_order');
    }

}
