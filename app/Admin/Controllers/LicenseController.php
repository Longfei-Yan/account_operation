<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\GoodsCategoryTable;
use App\Admin\Renderable\SiteTable;
use App\Admin\Repositories\License;
use App\Models\GoodsCategory;
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
            $grid->column('name');
            $grid->column('photo')->image();
            $grid->column('logo')->image();
            $grid->site(admin_trans_label('count'))->display(function ($site) {
                $count = count($site);
                return "{$count}";
            })->modal('Site', SiteTable::make());
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('name');

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
        return Show::make($id, new License(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('title');
            $show->field('address');
            $show->field('count');
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
            $form->text('name')->required();
            $form->text('title')->required();
            $form->text('address')->required();
            $form->textarea('about')->required();
            $form->multipleSelectTable('category_id')
                ->title(admin_trans_label('category'))
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(GoodsCategoryTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(GoodsCategory::class, 'id', 'title')
                ->required(); // 设置编辑数据显示
            $form->image('photo')->move('images/license')->autoUpload();
            $form->image('logo')->move('images/logo')->uniqueName()->autoUpload();
            $form->image('banner')->move('images/banner')->uniqueName()->autoUpload();
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
