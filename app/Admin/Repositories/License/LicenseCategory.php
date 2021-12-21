<?php

namespace App\Admin\Repositories\License;

use App\Models\License\LicenseCategory as Model;
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
