<?php

namespace App\Admin\Renderable;

use App\Models\Goods;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;

class GoodsTable extends LazyRenderable
{
    public function grid(): Grid
    {
        // 获取外部传递的参数
        $id = $this->id;

        return Grid::make(new Goods(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('created_at');
            $grid->column('updated_at');

            $grid->quickSearch(['id', 'title']);

            $grid->paginate(10);
            $grid->disableActions();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('title')->width(4);
            });
        });
    }
}
