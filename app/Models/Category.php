<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'phat_product_category';

	protected $fillable = [
        'name', 'picture', 'content', 'flag', 'administrator_id', 'product_industry_id'
    ];

    public function getAdministrator(){
		return $this->belongsTo('App\Models\Administrator', 'administrator_id');
	}

	public function getIndustry(){
		return $this->belongsTo('App\Models\Industry', 'product_industry_id');
	}

	public function getProduct($flag = null, $get = null){
		if ($flag == null) {
			return $this->hasMany('App\Models\Product', 'product_category_id', 'id');
		}
		else{
			if ($get != null) {
				return $this->hasMany('App\Models\Product', 'product_category_id', 'id')->where('flag', $flag)->orderBy('name', 'asc')->limit($get)->get();	
			}
			return $this->hasMany('App\Models\Product', 'product_category_id', 'id')->where('flag', $flag)->orderBy('name', 'asc')->get();
		}
	}

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
