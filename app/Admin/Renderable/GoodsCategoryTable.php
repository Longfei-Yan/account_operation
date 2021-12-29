<?php

namespace App\Admin\Renderable;

use App\Admin\Repositories\GoodsCategory;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;

class GoodsCategoryTable extends LazyRenderable
{
    public function grid(): Grid
    {
        // 获取外部传递的参数
        $id = $this->id;

        return Grid::make(new GoodsCategory(), function (Grid $grid) {
            $grid->column('id');
            $grid->column('title');

            $grid->quickSearch(['id', 'title']);

            $grid->paginate(10);
            $grid->disableActions();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('title')->width(4);
            });
        });
    }
}
