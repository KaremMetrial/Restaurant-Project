<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Slider extends Model
    {
        use HasFactory;

        protected $fillable = [
            'title',
            'image',
            'offer',
            'sub_title',
            'short_description',
            'link',
            'status'
        ];
        protected $casts = [
            'status' => 'boolean',
        ];

        // Scopes
        public function scopeActive(Builder $query): void
        {
            $query->where('status', true);
        }

    }
