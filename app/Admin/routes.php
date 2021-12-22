<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('licenseCategory', LicenseCategoryController::class);
    $router->resource('license', LicenseController::class);
    $router->resource('articleCategory', ArticleCategoryController::class);
    $router->resource('article', ArticleController::class);
    $router->resource('goodsCategory', GoodsCategoryController::class);
    $router->resource('goods', GoodsController::class);
});
