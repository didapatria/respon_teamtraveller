<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['brand', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhere('weight', 'like', '%' . $search . '%')
                    ->orWhere('os', 'like', '%' . $search . '%')
                    ->orWhere('internal', 'like', '%' . $search . '%')
                    ->orWhere('size', 'like', '%' . $search . '%')
                    ->orWhere('resolution', 'like', '%' . $search . '%')
                    ->orWhere('photo', 'like', '%' . $search . '%')
                    ->orWhere('video', 'like', '%' . $search . '%')
                    ->orWhere('ram', 'like', '%' . $search . '%')
                    ->orWhere('chipset', 'like', '%' . $search . '%')
                    ->orWhere('capacity', 'like', '%' . $search . '%')
                    ->orWhere('technology', 'like', '%' . $search . '%');
            });
        });

        $query->when(($filters['brand']) ?? false,
            fn ($query, $brand) =>
            $query->whereHas(
                'brand',
                fn ($query) =>
                $query->where('slug', $brand)
            )
        );

        $query->when(($filters['author']) ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
