<?php

namespace App\Admin\Renderable;
use App\Models\Article;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;

class ArticleTable extends LazyRenderable
{
    public function grid(): Grid
    {
        // 获取外部传递的参数
        $id = $this->id;

        return Grid::make(new Article(), function (Grid $grid) {
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
