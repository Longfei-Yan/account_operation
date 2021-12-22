<?php

namespace App\Models;

use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use ModelTree;

    protected $table = 'article_categories';

}
