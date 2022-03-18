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
            $grid->column('url')->filter(
                Grid\Column\Filter\Equal::make()->valueFilter()
            );
            $grid->column('ip')->label()->filter();
            $grid->column('country')->filter(
                Grid\Column\Filter\Equal::make()->valueFilter()
            );
            $grid->column('device')->label()->filter();
            $grid->column('language')->filter(
                Grid\Column\Filter\Equal::make()->valueFilter()
            );
            $grid->column('source')->filter(
                Grid\Column\Filter\Equal::make()->valueFilter()
            );
            $grid->column('created_at')->filter(
                Grid\Column\Filter\Between::make()->datetime()
            );
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('url');
                $filter->equal('ip');
                $filter->equal('country');
                $filter->like('source');

            });
            $grid->showColumnSelector();

            $grid->disableCreateButton();
            $grid->disableEditButton();
            $grid->disableDeleteButton();

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
