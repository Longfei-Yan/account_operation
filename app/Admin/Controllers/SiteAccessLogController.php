<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\SiteAccessLog;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class SiteAccessLogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new SiteAccessLog(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('url');
            $grid->column('ip');
            $grid->column('country');
            $grid->column('device');
            $grid->column('language');
            $grid->column('source');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
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
        return Show::make($id, new SiteAccessLog(), function (Show $show) {
            $show->field('id');
            $show->field('url');
            $show->field('ip');
            $show->field('country');
            $show->field('device');
            $show->field('language');
            $show->field('source');
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
        return Form::make(new SiteAccessLog(), function (Form $form) {
            $form->display('id');
            $form->text('url');
            $form->text('ip');
            $form->text('country');
            $form->text('device');
            $form->text('language');
            $form->text('source');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
