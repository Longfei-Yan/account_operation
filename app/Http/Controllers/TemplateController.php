<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Mailbox;
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
        $goodsId = explode(',', $site['goods_id']);
        $articleId = explode(',', $site['article_id']);
        $goods = Goods::select()->whereIn('id', $goodsId)->get();
        $article = Article::select()->whereIn('id', $articleId)->get();

        //$policy = Article::select()->whereIn('category_id', [1,2,3,4,5])->whereIn('id', $site['article_id'])->get();

        $mailbox = Mailbox::find($site['email_id']);

        $goodsCate = [];
        foreach ($goods as $itme){
            $goodsCate[] = $itme->category;
        }

        $data = [
            'license' => $license,
            'goods'   => $goods,
            'goodsCategory'   => $goodsCate,
            'article'   => $article,
            'mailbox'=> $mailbox,
        ];

        return view($template['template'], $data);
    }
}
