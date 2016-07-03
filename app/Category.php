<?php

namespace future;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function contents()
    {
        return $this->hasMany(Product::class);
    }
}
