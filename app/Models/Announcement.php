<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ko',
        'title_en',
        'body_ko',
        'body_en',
        'is_published',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function getTitleAttribute(): string
    {
        $locale = App::getLocale();
        return $locale === 'en' ? ($this->title_en ?: $this->title_ko) : $this->title_ko;
    }

    public function getBodyAttribute(): string
    {
        $locale = App::getLocale();
        return $locale === 'en' ? ($this->body_en ?: $this->body_ko) : $this->body_ko;
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }
}
