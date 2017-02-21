<?php

namespace Ecommerce;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
	protected $table = 'categories';

    protected $fillable = [
        'name', 'description', 'categories_id',
    ];

    public function upCategorie()
    {
        return $this->belongsTo('Ecommerce\Categorie','categorie_id','id');
    }

    public function downCategorie()
    {
    	return $this->hasMany('Ecommerce\Categorie','categorie_id','id');
    }


    public function Products()
    {
    	return $this->hasMany("Ecommerce\Product");
    }
}
