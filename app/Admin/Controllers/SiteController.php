<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\ArticleTable;
use App\Admin\Renderable\GoodsTable;
use App\Admin\Renderable\LicenseTable;
use App\Admin\Renderable\TemplateTable;
use App\Admin\Repositories\Site;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Goods;
use App\Models\License;
use App\Models\Mailbox;
use App\Models\Template;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Admin;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Log;

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
            $grid->column('domain')->copyable();
            $grid->column('license_id')->display(function($licenseId) {
                return License::find($licenseId)->name;
            });
            $grid->column('goods_id');
            $grid->column('article_id');
            $grid->column('template_id')->display(function($templateId) {
                return Template::find($templateId)->template;
            });
            $grid->column('email_id');
            $grid->column('note');
            $grid->column('updated_at')->sortable();
            $grid->column('state')
                ->using([1 => '未处理', 2 => '已处理', 3 => '成功', 4 => '失败'])
                ->dot(
                    [
                        1 => 'primary',
                        2 => Admin::color()->info(),
                        3 => 'success',
                        4 => 'danger',
                    ],
                    'primary' // 第二个参数为默认值
                )
                ->filter(
                    Grid\Column\Filter\In::make([1 => '未处理', 2 => '已处理', 3 => '成功', 4 => '失败'])
                );

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('domain');
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
        return Show::make($id, new Site(), function (Show $show) {
            $show->field('id');
            $show->field('domain');
            $show->field('license_id');
            $show->field('goods_id');
            $show->field('article_id');
            $show->field('template_id');
            $show->field('email_id');
            $show->field('note');
            $show->field('state');
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
            $form->text('domain')->required();
            $form->selectTable('license_id')
                ->required()
                ->title(admin_trans_label('license'))
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(LicenseTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(License::class, 'id', 'name'); // 设置编辑数据显示

            $form->hidden('goods_id');
            $form->hidden('article_id');
            $form->hidden('email_id');
            $form->saving(function (Form $form) {
                //商品
                $license = License::find($form->license_id);
                $goodsId = [];
                foreach ($license['category_id'] as $item){
                    $goods = Goods::select('id')->where('category_id', '=', $item)->inRandomOrder()->take(3)->get();
                    foreach ($goods as $item){
                        $goodsId[] = $item['id'];
                    }
                }
                $form->goods_id = implode(',', $goodsId);

                //文章
                $artCate = ArticleCategory::select('id')->get();
                $articleId = [];
                foreach ($artCate as $itme){
                    $article = Article::select('id')->where('category_id', '=', $itme['id'])->inRandomOrder()->take(1)->get();
                    $articleId[] = $article[0]['id'];
                }
                $form->article_id = implode(',', $articleId);

                //邮箱
                $emailId = Mailbox::select('id')->inRandomOrder()->take(1)->get();
                $form->email_id = $emailId[0]['id'];
            });

//            $form->multipleSelectTable('goods_id')
//                ->required()
//                ->title(admin_trans_label('goods'))
//                ->dialogWidth('50%') // 弹窗宽度，默认 800px
//                ->from(GoodsTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
//                ->model(Goods::class, 'id', 'title'); // 设置编辑数据显示
//
//            $form->multipleSelectTable('article_id')
//                ->required()
//                ->title(admin_trans_label('article'))
//                ->dialogWidth('50%') // 弹窗宽度，默认 800px
//                ->from(ArticleTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
//                ->model(Article::class, 'id', 'title'); // 设置编辑数据显示
//
//            $form->selectTable('template_id')
//                ->required()
//                ->title(admin_trans_label('template'))
//                ->dialogWidth('50%') // 弹窗宽度，默认 800px
//                ->from(TemplateTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
//                ->model(Template::class, 'id', 'note'); // 设置编辑数据显示

            $form->text('note');

            $directors = [1 => '未处理', 2 => '已处理', 3 => '成功', 4 => '失败'];
            $form->select('state')->options($directors);

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
