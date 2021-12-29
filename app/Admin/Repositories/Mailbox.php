<?php

namespace App\Admin\Repositories;

use App\Models\Mailbox as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Mailbox extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
