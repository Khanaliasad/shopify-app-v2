<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Osiset\ShopifyApp\Contracts\ShopModel  as IShopModel;
use Osiset\ShopifyApp\Traits\ShopModel as ShopifyShopTrait;

class Shop extends Authenticatable implements IShopModel
{
    use SoftDeletes;
    use ShopifyShopTrait;

    protected $table = 'users';
}
