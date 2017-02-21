<?php

namespace Ecommerce;

use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;


use Cartalyst\Tags\TaggableTrait;
use Cartalyst\Tags\TaggableInterface;

class Product extends Model implements TaggableInterface
{

	use TaggableTrait;

	public static function scopeLatest($query)
	{
		 return $query->orderBy("id","desc");
	}

	public function paypalItem()
	{
		return \PayPalPayment::item()->setName($this->title)
									->setDescription($this->description)
									->setCurrency('USD')
									->setQuantity(1)
									->setPrice($this->pricing / 100);
	}

	public function Categorie()
	{
		 return $this->belongsTo('Ecommerce\Categorie');
	}
}
