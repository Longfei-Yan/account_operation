<?php

namespace App\Admin\Repositories;

use App\Models\LandingLink as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class LandingLink extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
