<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    public function site()
    {
        return $this->hasMany(Site::class);
    }

    public function getCategoryIdAttribute($value)
    {
        return explode(',', $value);
    }

    public function setCategoryIdAttribute($value)
    {
        $this->attributes['category_id'] = implode(',', $value);
    }

}
