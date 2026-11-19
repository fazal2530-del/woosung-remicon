<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ko',
        'name_en',
        'category',
        'grade_mpa',
        'block_width',
        'block_height',
        'block_length',
        'weight_kg',
        'coverage_per_m2',
        'g2b_code',
        'slump',
        'max_aggregate_size',
        'application_ko',
        'application_en',
        'features_ko',
        'features_en',
        'is_available',
        'sort_order',
        'image_path',
    ];

    protected function casts(): array
    {
        return [
            'grade_mpa' => 'float',
            'block_width' => 'integer',
            'block_height' => 'integer',
            'block_length' => 'integer',
            'weight_kg' => 'float',
            'is_available' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function getNameAttribute(): string
    {
        $locale = App::getLocale();
        return $locale === 'en' ? ($this->name_en ?: $this->name_ko) : $this->name_ko;
    }

    public function getApplicationAttribute(): ?string
    {
        $locale = App::getLocale();
        return $locale === 'en' ? ($this->application_en ?: $this->application_ko) : $this->application_ko;
    }

    public function getFeaturesAttribute(): ?string
    {
        $locale = App::getLocale();
        return $locale === 'en' ? ($this->features_en ?: $this->features_ko) : $this->features_ko;
    }

    public function getCategoryLabelAttribute(): string
    {
        $locale = App::getLocale();
        $labels = [
            'retaining_wall' => ['ko' => '보강토 옹벽블록', 'en' => 'Retaining Wall Block'],
            'paving'         => ['ko' => '보도·경관블록', 'en' => 'Paving & Landscape Block'],
            'revetment'      => ['ko' => '호안·환경식생블록', 'en' => 'Revetment & Eco Block'],
            'remicon'        => ['ko' => '레미콘', 'en' => 'Ready-Mixed Concrete'],
            'block'          => ['ko' => '콘크리트 블록', 'en' => 'Concrete Block'],
            'ascon'          => ['ko' => '아스콘', 'en' => 'Ascon'],
        ];

        return $labels[$this->category][$locale] ?? $this->category;
    }

    public function getImageUrlAttribute(): ?string
    {
        if ($this->image_path && file_exists(public_path($this->image_path))) {
            return asset($this->image_path);
        }
        return null;
    }

    public function getDimensionsAttribute(): ?string
    {
        if ($this->block_length && $this->block_width && $this->block_height) {
            return "{$this->block_length} × {$this->block_width} × {$this->block_height} mm";
        }
        return null;
    }

    public function scopeAvailable(Builder $query): Builder
    {
        return $query->where('is_available', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function scopeByCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }
}
