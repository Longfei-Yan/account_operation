<?php

namespace App\Admin\Renderable;

use App\Models\Site;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;

class SelectSiteTable extends LazyRenderable
{
    public function grid(): Grid
    {

        return Grid::make(new Site(), function (Grid $grid) {
            $grid->column('id');
            $grid->column('domain');

            $grid->quickSearch(['id', 'domain']);

            $grid->paginate(10);
            $grid->disableActions();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('id')->width(4);
                $filter->like('domain')->width(4);
            });
        });
    }
}
