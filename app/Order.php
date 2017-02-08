<?php

namespace Ecommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable=['id','shopping_cart_id','line1','line2','city','postal_code','state','email','status','guide_number','total'];

	public function address()
	{
		return "$this->line1 $this->line2";
	}

    public static function CreateFromPayPalResponse($response,$shopping_cart)
    {
    	$payer = $response->payer;

    	$orderData = (array) $payer->payer_info->shipping_address;
    	$orderData = $orderData[key($orderData)];
 		$orderData["email"] = $payer->payer_info->email;	   	
 		$orderData["total"] = $shopping_cart->total();
 		$orderData["shopping_cart_id"] = $shopping_cart->id;
    	return Order::create($orderData);
     }
}
