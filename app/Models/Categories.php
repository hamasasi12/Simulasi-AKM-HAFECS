<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'description',
        'banner_img',
        'time_limit',
    ];

    public function questions(){
        return $this->hasMany(Questions::class, 'category_id');
    }
}
