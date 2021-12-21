<?php

namespace App\Admin\Repositories;

use App\Models\License as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class License extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
