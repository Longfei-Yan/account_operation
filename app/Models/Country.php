<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function getCountrySelect()
    {
        $country = $this->all()->toArray();

        return array_column($country, 'country_name', 'id');
    }
}
