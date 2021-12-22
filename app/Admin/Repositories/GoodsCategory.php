<?php

namespace App\Admin\Repositories;

use App\Models\GoodsCategory as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class GoodsCategory extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
