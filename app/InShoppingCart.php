<?php

namespace Ecommerce;

use Illuminate\Database\Eloquent\Model;

class InShoppingCart extends Model
{
		protected $fillable = ["product_id","shopping_cart_id"];
}
