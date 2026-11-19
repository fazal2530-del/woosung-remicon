<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company',
        'phone',
        'email',
        'product_type',
        'quantity',
        'delivery_address',
        'preferred_date',
        'message',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'preferred_date' => 'date',
        ];
    }

    public function markAsRead(): void
    {
        $this->update(['status' => 'read']);
    }

    public function markAsReplied(): void
    {
        $this->update(['status' => 'replied']);
    }

    public function isNew(): bool
    {
        return $this->status === 'new';
    }

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'new' => '신규',
            'read' => '확인',
            'replied' => '답변완료',
            default => $this->status,
        };
    }
}
