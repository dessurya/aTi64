<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
	protected $table = 'phat_product_industry';

	protected $fillable = [
        'name', 'picture', 'content', 'flag', 'administrator_id'
    ];

    public function getAdministrator(){
		return $this->belongsTo('App\Models\Administrator', 'administrator_id');
	}

	public function getCategory($flag = null){
		if ($flag == null) {
			return $this->hasMany('App\Models\Category', 'product_industry_id', 'id');
		}
		else{
			return $this->hasMany('App\Models\Category', 'product_industry_id', 'id')->where('flag', $flag)->get();
		}
	}

	public function getProduct(){
		return $this->hasMany('App\Models\Product', 'product_industry_id', 'id');
	}

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
