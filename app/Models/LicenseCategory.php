<?php

namespace App\Models;

use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class LicenseCategory extends Model
{
    use ModelTree;

    protected $table = 'license_categories';

}
