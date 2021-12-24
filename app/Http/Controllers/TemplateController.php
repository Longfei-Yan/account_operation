<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
        $license = License::find($site['license_id']);

        $goodsId = explode(',', $site['goods_id']);
        $goods = Goods::select()->whereIn('id', $goodsId)->get();

        $articleId = explode(',', $site['article_id']);
        $article = Article::select()->whereIn('id', $articleId)->get();

        $data = [
            'license' => $license,
            'goods'   => $goods,
            'article'=>$article
        ];
        return view($template['template'], $data);

    }
}
