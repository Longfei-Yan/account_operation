<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\ArticleTable;
use App\Admin\Renderable\GoodsTable;
use App\Admin\Renderable\LicenseTable;
use App\Admin\Renderable\TemplateTable;
use App\Admin\Repositories\Site;
use App\Models\Goods;
use App\Models\License;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class SiteController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Site(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('domain');
            $grid->column('license_id');
            $grid->column('goods_id');
            $grid->column('article_id');
            $grid->column('template_id');
            $grid->column('note');
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
        return Show::make($id, new Site(), function (Show $show) {
            $show->field('id');
            $show->field('domain');
            $show->field('license_id');
            $show->field('goods_id');
            $show->field('article_id');
            $show->field('template_id');
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
        return Form::make(new Site(), function (Form $form) {
            $form->display('id');
            $form->text('domain');
            $form->selectTable('license_id')
                ->title('弹窗标题')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(LicenseTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(License::class, 'id', 'title'); // 设置编辑数据显示

            $form->multipleSelectTable('goods_id')
                ->title('弹窗标题')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(GoodsTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(License::class, 'id', 'title'); // 设置编辑数据显示

            $form->multipleSelectTable('article_id')
                ->title('弹窗标题')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(ArticleTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(License::class, 'id', 'title'); // 设置编辑数据显示

            $form->selectTable('template_id')
                ->title('弹窗标题')
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(TemplateTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(License::class, 'id', 'title'); // 设置编辑数据显示

            $form->text('note');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
