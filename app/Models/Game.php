<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $guarded = ['genres', 'image'];

    public function genres() {
        return $this->belongsToMany(Genre::class)->withTimestamps();
    }
  
    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function platforms() {
        return $this->belongsToMany(Platform::class)->withTimestamps();
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn(string|null $value) => $value !== null ? asset('storage/' . $value) : null,
        );
    }
}
