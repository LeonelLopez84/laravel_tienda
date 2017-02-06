<?php

namespace Ecommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public function paypalItem()
	{
		return \PayPalPayment::item()->setName($this->title)
									->setDescription($this->description)
									->setCurrency('USD')
									->setQuantity(1)
									->setPrice($this->pricing / 100);
	}
}
