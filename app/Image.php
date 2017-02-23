<?php

namespace Ecommerce;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = ["name","extension","product_id"];


	public function Product()
    {
        return $this->belongsTo('Ecommerce\Product');
    }
    
}
