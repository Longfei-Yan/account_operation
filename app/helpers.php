<?php
function abjump($data){
    $jsonData = array();
    $jsonData['username']   =   $data['account'];       //用户名
    $jsonData['password']   =   $data['pwd'];           //密码
    $jsonData['country']    =   $data['zone'];//投放的国家地区，ALL为全可以访问，留空为全部不允许
    $jsonData['mobile']     =   $data['mobile'];//1为只允许手机 2为只允许pc 0为不限制
    $jsonData['system_lang'] =   $data['systemlang'];//手机操作系统语言
    $jsonData['ip_white']   =   $data['ip_white'];//IP白名单
    $jsonData['ip_black']   =   $data['ip_black'];//IP黑名单
    $jsonData['source']     =   $data['source'];//来源
    $jsonData['domain']     =   $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $jsonData['ua']         =   $_SERVER['HTTP_USER_AGENT'];
    $jsonData['referer']    =   isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';
    $jsonData['lang']       =   getSystemLang();
    if(isset($_SERVER['HTTP_X_SHOPIFY_CLIENT_IP'])){
    $jsonData['ip']     = $_SERVER['HTTP_X_SHOPIFY_CLIENT_IP'];
    }
    else if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
    $jsonData['ip'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } else {
    if (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
    $jsonData['ip'] = getenv('HTTP_CLIENT_IP');
    } elseif (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
    $jsonData['ip'] = getenv('HTTP_X_FORWARDED_FOR');
    } elseif (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
    $jsonData['ip'] = getenv('REMOTE_ADDR');
    } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
    $jsonData['ip'] = $_SERVER['REMOTE_ADDR'];
    }
    }
    $ch = curl_init('http://v.abcloak.com/v6.php');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_TIMEOUT,1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($jsonData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $return = curl_exec($ch);

    if (!$return) return false;

    $return = json_decode($return, true);
    $boolean = $return['result'];

    return $boolean;
}


//获取系统语言
function getSystemLang(){
    $lang           = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    $lang_arr       = explode(';',$lang);
    $system_lang    = strtolower($lang_arr[0]);
    $browser_lang   = explode(',',$system_lang);
    $real_browser_lang   = strtolower($browser_lang[0]);;

    return $real_browser_lang;
}


/**
 * 用户设备类型
 * @return string
 */
function clientOS() {

    $agent = strtolower($_SERVER['HTTP_USER_AGENT']);

    if(strpos($agent, 'windows nt')) {
        $platform = 'windows';
    } elseif(strpos($agent, 'macintosh')) {
        $platform = 'mac';
    } elseif(strpos($agent, 'ipod')) {
        $platform = 'ipod';
    } elseif(strpos($agent, 'ipad')) {
        $platform = 'ipad';
    } elseif(strpos($agent, 'iphone')) {
        $platform = 'iphone';
    } elseif (strpos($agent, 'android')) {
        $platform = 'android';
    } elseif(strpos($agent, 'unix')) {
        $platform = 'unix';
    } elseif(strpos($agent, 'linux')) {
        $platform = 'linux';
    } else {
        $platform = 'other';
    }

    return $platform;
}

