<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\License;
use App\Models\Goods;

class TemplateController extends Controller
{
    public function index(){
        $license = License::find(1);
        $goods = Goods::select()->get();

        $url = '127.0.0.1';

        $data = [
            'license' => $license,
            'goods'   => $goods
        ];

        $template = 'test';

        if ($_SERVER['SERVER_NAME'] == $url){
            return view($template, $data);
        }else{
            return '404';
        }

    }
}
