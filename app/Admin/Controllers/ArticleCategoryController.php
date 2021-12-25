<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ArticleCategory;
use Dcat\Admin\Form;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Tree;
use Dcat\Admin\Http\Controllers\AdminController;

class ArticleCategoryController extends AdminController
{
    public function index(Content $content)
    {
        return $content->header(admin_trans_label('ArticleCategory'))
            ->body(function (Row $row) {
                $tree = new Tree(new ArticleCategory);
                $tree->branch(function ($branch) {

                    return $branch['title'];
                });

                $row->column(12, $tree);
            });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new ArticleCategory(), function (Form $form) {
            $form->display('id');
            $form->select('parent_id')->options(function (){
                return \App\Models\ArticleCategory::selectOptions();
            })->saving(function ($v) {
                return (int) $v;
            });
            $form->text('title');
            //$form->text('icon');
            $form->switch('show')->default(1);

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
