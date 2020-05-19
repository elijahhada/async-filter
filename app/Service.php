<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Service extends Model
{
    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at', 'laravel_through_key'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
