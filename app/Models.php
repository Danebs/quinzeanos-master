<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $fillable = ['name','description','mark_id'];

    public function mark(){
        return $this->belongsTo(Mark::class);
    }
}
