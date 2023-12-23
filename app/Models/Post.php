<?php

namespace App\Models;

use App\Casts\FileUploadCast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "preview",
        "description",
        "thumbnail",
    ];

    // Определение отношения многие ко многим с моделью Ingredient
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_post')->withPivot('quantity');
    }

    // Определение каста для поля 'ingredients'
    protected $casts = [
        'ingredients' => FileUploadCast::class,
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy("created_at");
    }

}
