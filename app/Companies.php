<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = ['name','cnpj','who_are_us','resume','facebook','google_plus','twitter','linkedin'];

    public function contacts(){
        return $this->hasMany(Contacts::class,'company_id');
    }
    public function address(){
        return $this->hasMany(Address::class,'company_id');
    }
}
