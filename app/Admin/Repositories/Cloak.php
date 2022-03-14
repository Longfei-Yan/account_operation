<?php

namespace App\Admin\Repositories;

use App\Models\Cloak as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Cloak extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
