<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // Добавьте другие поля, если необходимо
    ];

    // Определение отношения многие ко многим с моделью Post
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withPivot('quantity');
    }
}
