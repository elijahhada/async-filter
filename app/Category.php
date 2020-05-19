<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
use App\Service;

class Category extends Model
{
    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function services()
    {
        return $this->hasMany('App\Service');
    }
}
