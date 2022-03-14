<?php

namespace App\Admin\Renderable;

use App\Models\Country;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;

class SelectCountryTable extends LazyRenderable
{
    public function grid(): Grid
    {
        return Grid::make(new Country(), function (Grid $grid) {
            $grid->column('id');
            $grid->column('country_name');
            $grid->column('country_code');

            $grid->quickSearch(['id', 'country_name', 'country_code']);

            $grid->paginate(10);
            $grid->disableActions();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('country_name')->width(4);
                $filter->like('country_code')->width(4);
            });
        });
    }
}
