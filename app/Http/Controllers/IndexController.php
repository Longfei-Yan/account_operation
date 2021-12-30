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

class IndexController extends Controller
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

        $mailbox = Mailbox::find($site['email_id']);

        $goodsCate = [];
        foreach ($goods as $itme){
            $goodsCate[] = $itme->category;
        }

        $data = [
            'license' => $license,
            'goods'   => $goods,
            'goodsCategory'   => array_unique($goodsCate),
            'article'   => $article,
            'mailbox'=> $mailbox,
        ];

        return view($template['template'], $data);
    }

    public function get(){
        //检测是否许可的域名
        $site = Site::select()->where('domain', '=', $this->currentDomain)->first();
        if (empty($site)){
            return json_encode([
                'code' => 0,
                'msg'  => 'Illegal Domain',
                'data' => '',
            ], JSON_FORCE_OBJECT);
        }

        //获取执照，商品，文章
        //1获取指定商品包括分类的完整collection
        $license = License::find($site['license_id']);
        $goodsId = explode(',', $site['goods_id']);
        $articleId = explode(',', $site['article_id']);
        $goods = Goods::select()->whereIn('id', $goodsId)->get();
        $article = Article::select()->whereIn('id', $articleId)->get();

        $mailbox = Mailbox::find($site['email_id']);

        $goodsCate = [];
        foreach ($goods as $itme){
            $goodsCate[] = $itme->category;
        }

        $data = [
            'license' => $license,
            'goods'   => $goods,
            'goodsCategory'   => array_unique($goodsCate),
            'article'   => $article,
            'mailbox'=> $mailbox,
        ];

        return json_encode([
            'code' => 1,
            'msg'  => 'Request Success',
            'data' => $data,
        ], JSON_FORCE_OBJECT);
    }
}