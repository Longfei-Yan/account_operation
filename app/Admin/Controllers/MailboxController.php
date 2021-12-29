<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Mailbox;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class MailboxController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Mailbox(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('email');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });

            $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
                $create->email('email', '邮箱');
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
        return Show::make($id, new Mailbox(), function (Show $show) {
            $show->field('id');
            $show->field('email');
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
        return Form::make(new Mailbox(), function (Form $form) {
            $form->display('id');
            $form->email('email');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
