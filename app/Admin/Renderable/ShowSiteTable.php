<?php
namespace App\Admin\Renderable;

use App\Models\Site;
use Dcat\Admin\Support\LazyRenderable;
use Dcat\Admin\Widgets\Table;

class ShowSiteTable extends LazyRenderable
{
    public function render()
    {
        // 获取ID
        $id = $this->key;

        $data = Site::where('license_id', $id)
            ->get(['domain', 'note', 'created_at'])
            ->toArray();

        $titles = [
            'Domain',
            'Note',
            'Created At',
        ];

        return Table::make($titles, $data);
    }
}
