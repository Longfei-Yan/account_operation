<?php

namespace App\Admin\Repositories;

use App\Models\LicenseCategory as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class LicenseCategory extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
