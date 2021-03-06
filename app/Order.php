<?php

namespace Ecommerce;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Mail;
use Ecommerce\Mail\OrderCreated;
use Ecommerce\Mail\OrderUpdated;

class Order extends Model
{
	protected $fillable=['id','recipient_name','shopping_cart_id','line1','line2','city','postal_code','state','email','status','guide_number','total'];

    public function sendMail()
    {
        Mail::to("harry1607@hotmail.com")->send(new OrderCreated($this));
    }

    public function sendUpdateMail()
    {
        Mail::to("harry1607@hotmail.com")->send(new OrderUpdated($this));
    }
    public function shoppingCartID()
    {
        return $this->shopping_cart->customid;
    }
    public function scopeLatest($query)
    {
        return $query->orderID()->monthly();
    }
    public function scopeOrderID($query)
    {
        return $query->orderBy("id","desc");
    }

    public function scopeMonthly($query)
    {
        return $query->whereMonth("created_at","=",date("m"));
    }

	public function address()
	{
		return "$this->line1 $this->line2";
	}

    public function shopping_cart()
    {
        return $this->belongsTo('Ecommerce\ShoppingCart');
    }

    public static function  totalMonthCount()
    {
        return self::monthly()->count();
    }

    public static function totalMonth()
    {
        return self::monthly()->sum('total') / 100;
    }

    public static function createFromPayPalResponse($response,$shopping_cart)
    {
    	$payer = $response->payer;

    	$orderData = (array) $payer->payer_info->shipping_address;
    	$orderData = $orderData[key($orderData)];
 		$orderData["email"] = $payer->payer_info->email;	   	
 		$orderData["total"] = $shopping_cart->total();
 		$orderData["shopping_cart_id"] = $shopping_cart->id;
    	return self::create($orderData);
     }
}
