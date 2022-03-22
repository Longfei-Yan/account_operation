<?php

namespace App\Admin\Renderable;
use App\Models\License;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;

class LicenseTable extends LazyRenderable
{
    public function grid(): Grid
    {
        return Grid::make(new License(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('created_at');
            $grid->column('updated_at');

            $grid->quickSearch(['id', 'name']);

            $grid->paginate(10);
            $grid->disableActions();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('name')->width(4);
            });
        });
    }
}
