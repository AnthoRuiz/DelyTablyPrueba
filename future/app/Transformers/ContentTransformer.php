<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 02/07/2016
 * Time: 11:15 PM
 */

namespace future\Transformers;
use future\Category;
use future\Content;
use League\Fractal\TransformerAbstract;


class ContentTransformer extends TransformerAbstract
{
    public function transform(Content $content){
        return [
            'id' => $content->id,
            'title'=> $content->title,
            'description'=> $content->description,
            'publishing_date'=> $content->publishing_date,
            'exp_date'=> $content->exp_date,
            'authorEmail'=> $content->userPost->email,
            'category'=> $content->categoryContent->name,
            
        ];
    }
}