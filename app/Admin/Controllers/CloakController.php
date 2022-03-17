<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\SelectCountryTable;
use App\Admin\Renderable\SelectSiteTable;
use App\Admin\Repositories\Cloak;
use App\Models\Country;
use App\Models\Site;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Log;

class CloakController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Cloak(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('site_id')->display(function($siteId){
                return Site::find($siteId)->domain;
            })->copyable();
            $grid->column('country_id')->display(function($countryId){
                $country = Country::whereIn('id', json_decode($countryId))->get();
                $country_names = [];
                foreach ($country as $item){
                    $country_names[] = $item->country_name;
                }
                return implode(',', $country_names);
            });
            $grid->column('landing_link')->copyable();
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
        return Show::make($id, new Cloak(), function (Show $show) {
            $show->field('id');
            $show->field('site_id');
            $show->field('country_id');
            $show->field('landing_link');
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
        return Form::make(new Cloak(), function (Form $form) {
            $form->display('id');
            $form->selectTable('site_id')
                ->title('网站')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(SelectSiteTable::make()) // 设置渲染类实例，并传递自定义参数
                ->model(Site::class, 'id', 'domain'); // 设置编辑数据显示
            $form->multipleSelectTable('country_id')
                ->title('国家')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(SelectCountryTable::make()) // 设置渲染类实例，并传递自定义参数
                ->model(Country::class, 'id', 'country_name'); // 设置编辑数据显示


            $form->text('landing_link');
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
