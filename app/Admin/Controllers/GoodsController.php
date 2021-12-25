<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Goods;
use App\Admin\Repositories\GoodsCategory;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class GoodsController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Goods(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('description');
            $grid->column('content');
            $grid->column('price');
            $grid->column('thumbnail')->image();
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });

            $grid->disableEditButton();
            $grid->showQuickEditButton();

            $grid->enableDialogCreate();
            // 设置弹窗宽高，默认值为 '700px', '670px'
            $grid->setDialogFormDimensions('60%', '100%');
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Goods(), function (Show $show) {
            $show->field('id');
            $show->field('category_id');
            $show->field('title');
            $show->field('description');
            $show->field('content');
            $show->field('price');
            $show->field('thumbnail');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Goods(), function (Form $form) {
            $form->display('id');
            $form->select('category_id')->options(function (){
                return \App\Models\GoodsCategory::selectOptions();
            })->saving(function ($v) {
                return (int) $v;
            });
            $form->text('title');
            $form->textarea('description');
            $form->textarea('content');
            $form->text('price');
            $form->image('thumbnail')->move('images/goods')->uniqueName()->autoUpload();

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
