<?php

namespace App\Admin\Renderable;
use App\Models\Template;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;

class TemplateTable extends LazyRenderable
{
    public function grid(): Grid
    {
        // 获取外部传递的参数
        $id = $this->id;

        return Grid::make(new Template(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('note');
            $grid->column('created_at');
            $grid->column('updated_at');

            $grid->quickSearch(['id', 'note']);

            $grid->paginate(10);
            $grid->disableActions();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('note')->width(4);
            });
        });
    }
}
