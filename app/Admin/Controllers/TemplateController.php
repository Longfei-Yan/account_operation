<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Template;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class TemplateController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Template(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('template');
            $grid->column('note');
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
        return Show::make($id, new Template(), function (Show $show) {
            $show->field('id');
            $show->field('template');
            $show->field('note');
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
        return Form::make(new Template(), function (Form $form) {
            $form->display('id');
            $form->file('template')->disk('template')->move('templates')->accept('php,html')->name(md5(uniqid(mt_rand(), true)).'.blade.php')->autoUpload()->required();
            $form->text('note');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
