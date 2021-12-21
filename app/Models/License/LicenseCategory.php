<?php

namespace App\Models\License;

use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class LicenseCategory extends Model
{
    use ModelTree;

    protected $table = 'license_categories';

    // Since v2.1.6-beta，定义depthColumn属性后，将会在数据表保存当前行的层级
    protected $depthColumn = 'depth';

}
