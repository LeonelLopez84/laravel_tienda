<?php

namespace Ecommerce;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{

		public $fillable=["status"];

		public function inShoppingCarts()
		{
			return $this->hasMany("Ecommerce\InShoppingCart");
		}

		public function products()
		{
			return $this->belongsToMany("Ecommerce\Product","in_shopping_carts");
		}

		public function productsSize()
		{
			return $this->products()->count();
		}

		public function total()
		{
			return $this->products()->sum("pricing");
		}

		public function totalUSD()
		{
			return $this->products()->sum("pricing") / 100;
		}

	    public static function findOrCreateBySessionID($shopping_cart_id)
	    {
	    	if(!is_null($shopping_cart_id))
	    	{
	    		return self::findBySession($shopping_cart_id);
	    	}else{
					return self::createWithoutSession();
	    	}
	    }

	    public static function findBySession($shopping_cart_id)
	    {
	    	return ShoppingCart::find($shopping_cart_id);
	    }

	    public static function createWithoutSession()
	    {

	    	return ShoppingCart::create([
	    			"status"=>"incompleted"
	    		]);
	    }


}