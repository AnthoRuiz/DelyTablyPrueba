<?php

namespace future;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['user_id', 'category_id', 'title', 'description', 'publishing_date', 'exp_date', 'author'];

    public function userPost()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categoryContent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}