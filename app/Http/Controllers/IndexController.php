<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Mailbox;
use App\Models\License;
use App\Models\Goods;
use App\Models\Site;
use App\Models\Template;

class IndexController extends Controller
{
    public function index(){
        //检测是否许可的域名
        $site = Site::select()->where('domain', '=', $_SERVER['HTTP_HOST'])->first();
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
        $banner = Banner::find($site['banner_id']);

        $goodsCate = [];
        foreach ($goods as $itme){
            $goodsCate[] = $itme->category;
        }

        $license['logo'] = config('filesystems.disks.admin.url').'/'.$license->logo;
        $license['banner'] = config('filesystems.disks.admin.url').'/'.$license->banner;

        foreach ($goods as $itme){
            $itme['thumbnail'] = config('filesystems.disks.admin.url').'/'.$itme->thumbnail;
        }

        $data = [
            'license' => $license,
            'goods'   => $goods,
            'goodsCategory'   => array_unique($goodsCate),
            'article'   => $article,
            'mailbox'=> $mailbox,
            'banner'=>$banner,
        ];

        return view(str_replace('.blade.php', '', $template['template']), $data);
    }

    public function get(){
        header("Access-Control-Allow-Origin: *");

        //检测是否许可的域名
        $domain = str_replace('http://','',$_SERVER['HTTP_ORIGIN']);
        $site = Site::select()->where('domain', '=', $domain)->first();
        if (empty($site)){
            return json_encode([
                'code' => 0,
                'msg'  => 'Illegal Domain',
                'data' => '',
            ], JSON_FORCE_OBJECT);
        }

        //获取执照，商品，文章
        //1获取指定商品包括分类的完整collection
        $license = License::select('id', 'title', 'address', 'about', 'logo', 'banner')->find($site['license_id']);
        $goodsId = explode(',', $site['goods_id']);
        $articleId = explode(',', $site['article_id']);
        $goods = Goods::select('id', 'title', 'description', 'content', 'price', 'thumbnail', 'category_id')->whereIn('id', $goodsId)->get();
        $article = Article::select()->whereIn('id', $articleId)->get();
        $mailbox = Mailbox::find($site['email_id']);
        $banner = Banner::find($site['banner_id']);

        $goodsCate = [];
        foreach ($goods as $itme){
            $goodsCate[] = $itme->category;
        }

        $license['logo'] = config('filesystems.disks.admin.url').'/'.$license->logo;
        $license['banner'] = config('filesystems.disks.admin.url').'/'.$license->banner;

        foreach ($goods as $itme){
            $itme['thumbnail'] = config('filesystems.disks.admin.url').'/'.$itme->thumbnail;
        }

        $data = [
            'license' => $license,
            'goods'   => $goods,
            'goodsCategory'   => array_unique($goodsCate),
            'article'   => $article,
            'mailbox'=> $mailbox,
            'banner'=>$banner,
        ];

        return json_encode([
            'code' => 1,
            'msg'  => 'Request Success',
            'data' => $data,
        ], JSON_FORCE_OBJECT);
    }
}
