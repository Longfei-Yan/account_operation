<?php

namespace App\Admin\Repositories;

use App\Models\SiteAccessLog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class SiteAccessLog extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
