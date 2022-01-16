<?php

namespace App\Exceptions\Tools;

use App\Models\Site;
use Dcat\Admin\Grid\BatchAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BatchCpoyDomain extends BatchAction
{
    protected $action;

    // 注意action的构造方法参数一定要给默认值
    public function __construct($title = null, $action = 1)
    {
        $this->title = $title;
        $this->action = $action;
    }

    // 处理请求
    public function handle(Request $request)
    {
        // 获取选中的文章ID数组
        $keys = $this->getKey();

        $domain = Site::select('domain')->whereIn('id', $keys)->get();

        return $this->response()->success('复制域名成功')->refresh();
    }

    public function actionScript(){
        $warning = __('No data selected!');

        return <<<JS
function (data, target, action) {
    var key = {$this->getSelectedKeysScript()}

    var tag = document.createElement('input');
    tag.setAttribute('id', 'cp_hgz_input');
    tag.value = {$this->getSelectedKeysScript()};
    document.getElementsByTagName('body')[0].appendChild(tag);
    document.getElementById('cp_hgz_input').select();
    document.execCommand('copy');
    document.getElementById('cp_hgz_input').remove();

    if (key.length === 0) {
        Dcat.warning('{$warning}');
        return false;
    }
    // 设置主键为复选框选中的行ID数组
    action.options.key = key;
}
JS;
    }
}
