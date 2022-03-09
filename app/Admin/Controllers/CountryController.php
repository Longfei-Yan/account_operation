<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Country;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class CountryController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Country(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('country_name');
            $grid->column('country_code');
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
        return Show::make($id, new Country(), function (Show $show) {
            $show->field('id');
            $show->field('country_name');
            $show->field('country_code');
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
        return Form::make(new Country(), function (Form $form) {
            $form->display('id');
            $form->text('country_name');
            $form->text('country_code');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
