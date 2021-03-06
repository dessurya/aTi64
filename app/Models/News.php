<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $table = 'phat_news';

	protected $fillable = [
        'name', 'picture', 'content', 'flag', 'administrator_id'
    ];

    public function getAdministrator(){
		return $this->belongsTo('App\Models\Administrator', 'administrator_id');
	}

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
