<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public function getGoodsIdAttribute($value)
    {
        return explode(',', $value);
    }

    public function getArticleIdAttribute($value)
    {
        return explode(',', $value);
    }

    public function setGoodsIdAttribute($value)
    {
        $this->attributes['goods_id'] = implode(',', $value);
    }

    public function setArticleIdAttribute($value)
    {
        $this->attributes['article_id'] = implode(',', $value);
    }
}
