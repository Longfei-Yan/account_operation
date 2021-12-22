<?php

namespace App\Models;

use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class GoodsCategory extends Model
{
    use ModelTree;

    protected $table = 'goods_categories';

}
