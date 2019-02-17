<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Record extends Model
{
    protected $fillable = [
        'name', 'description', 'url'
    ];

    public function get_attributes()
    {
    	return $this->attributes;
    }
}
