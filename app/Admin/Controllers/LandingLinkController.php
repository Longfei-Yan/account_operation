<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\LandingLink;
use App\Models\Country;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class LandingLinkController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new LandingLink(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('country_id');
            $grid->column('url');
            $grid->column('top');
            $grid->column('flag')->using([0 => '否', 1 => '是']);
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
        return Show::make($id, new LandingLink(), function (Show $show) {
            $show->field('id');
            $show->field('country_id');
            $show->field('url');
            $show->field('top');
            $show->field('flag')->using([0 => '否', 1 => '是']);
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
        return Form::make(new LandingLink(), function (Form $form) {
            $form->display('id');

            $country = (new Country)->getCountrySelect();
            $form->select('country_id')->options($country);
            $form->url('url');
            //$form->datetime('top')->default(date('Y-m-d H:i:s'));
            $form->hidden('top');
            $form->saving(function (Form $form) {
                $form->top = date('Y-m-d H:i:s');
            });
            $form->switch('flag')->default(0);

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
