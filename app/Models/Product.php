<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'phat_product';

	protected $fillable = [
        'name', 'picture', 'content', 'flag', 'administrator_id', 'product_industry_id', 'product_category_id'
    ];

    public function getAdministrator(){
		return $this->belongsTo('App\Models\Administrator', 'administrator_id');
	}

	public function getIndustry(){
		return $this->belongsTo('App\Models\Industry', 'product_industry_id');
	}

	public function getCategory(){
		return $this->belongsTo('App\Models\Category', 'product_category_id');
	}

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
