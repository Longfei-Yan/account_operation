<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use App\Models\License;
use App\Models\Goods;
use App\Models\Site;
use App\Models\Template;

class TemplateController extends Controller
{
    protected $currentDomain;

    public function __construct()
    {
        $this->currentDomain = $_SERVER['HTTP_HOST'];
    }

    public function index(){

        //检测是否许可的域名
        $site = Site::select()->where('domain', '=', $this->currentDomain)->first();
        if (empty($site)){
            return view('404');
        }

        //匹配模板
        $template = Template::find($site['template_id']);
        if (empty($template)){
            return view('404');
        }

        //获取执照，商品，文章
        //1获取指定商品包括分类的完整collection
        $license = License::find($site['license_id']);
        $goods = Goods::select()->whereIn('id', $site['goods_id'])->get();
        $article = Article::select()->whereIn('id', $site['article_id'])->get();

        $policy = Article::select()->whereIn('category_id', [1,2,3,4,5])->whereIn('id', $site['article_id'])->get();

        $about = Article::select()->where('category_id', '=', 6)->whereIn('id', $site['article_id'])->first();
        $email = Article::select()->where('category_id', '=', 7)->whereIn('id', $site['article_id'])->first();

        $data = [
            'license' => $license,
            'goods'   => $goods,
            'article'   => $article,
            'policy'=> $policy,
            'about'=> $about,
            'email'=> $email,
        ];

        return view($template['template'], $data);
    }
}
