<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table='categories';

    protected $fillable = [
        'id','name','description','store_id','active','created_at','updated_at',
    ];

    public function scopeSelection($query)
    {
        return $query ->select('id','name','store_id','description','active');
    }

    public function scopeActive($query)
    {
        return $query ->where('active',1);
    }
    
    public function getActive(){
        return   $this -> active == 1 ? 'مفعل'  : 'غير مفعل';
    }

    public function store()
    {
        return $this->belongsTo('App\Models\Store', 'store_id', 'id');
    }

    public function products(){

        return $this -> hasMany('App\Models\Product','cat_id','id');
    }
}
