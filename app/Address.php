<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['name','address','neighborhood','city','state','zip','reference','company_id'];
}
