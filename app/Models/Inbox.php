<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
	protected $table = 'phat_inbox';

	protected $fillable = [
        'name', 'handphone', 'email', 'subject', 'message', 'flag'
    ];

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
