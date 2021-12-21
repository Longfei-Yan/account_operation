<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\License;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class LicenseController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new License(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('address');
            $grid->column('count');
            $grid->column('category_id');
            $grid->column('photo');
            $grid->column('logo');
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
        return Show::make($id, new License(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('address');
            $show->field('count');
            $show->field('category_id');
            $show->field('photo');
            $show->field('logo');
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
        return Form::make(new License(), function (Form $form) {
            $form->display('id');
            $form->text('title');
            $form->text('address');
            //$form->text('count');
            $form->select('category_id')->options(function (){
                return \App\Models\LicenseCategory::selectOptions();
            })->saving(function ($v) {
                return (int) $v;
            });
            $form->image('photo')->thumbnail('small', $width = 300, $height = 300)->move('public/upload/image/license/');
            $form->image('logo')->thumbnail('small', $width = 300, $height = 300)->move('public/upload/image/logo/');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
