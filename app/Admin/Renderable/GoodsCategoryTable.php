<?php

namespace App\Admin\Renderable;

use App\Admin\Repositories\GoodsCategory;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;

class GoodsCategoryTable extends LazyRenderable
{
    public function grid(): Grid
    {
        return Grid::make(new GoodsCategory(), function (Grid $grid) {
            $grid->column('id');
            $grid->column('title');

            $grid->quickSearch(['id', 'title']);

            $grid->paginate(10);
            $grid->disableActions();
            $grid->model()->where('parent_id', '=', 0)->where('show', '=', 1);
            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('title')->width(4);
            });
        });
    }
}
