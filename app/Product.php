<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'image', 'description', 'custom_input', 'applications', 'warranty',
        'month_or_days', 'price','publish','model_id','category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function model(){
        return $this->belongsTo(Models::class);
    }
}
