<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\GoodsCategoryTable;
use App\Admin\Repositories\Banner;
use App\Models\GoodsCategory;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class BannerController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Banner(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('banner');
            $grid->column('category_id')->display(function($categoryId) {
                return GoodsCategory::find($categoryId)->title;
            });
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
        return Show::make($id, new Banner(), function (Show $show) {
            $show->field('id');
            $show->field('category_id');
            $show->field('banner');
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
        return Form::make(new Banner(), function (Form $form) {
            $form->display('id');
            $form->selectTable('category_id')
                ->title(admin_trans_label('category'))
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(GoodsCategoryTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(GoodsCategory::class, 'id', 'title')
                ->required(); // 设置编辑数据显示
            $form->image('banner')->move('images/banner')->uniqueName()->autoUpload();

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
