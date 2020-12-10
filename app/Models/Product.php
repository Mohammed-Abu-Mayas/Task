<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';

    protected $fillable = [
        'id','name','price','color','size','description','cat_id','active','created_at','updated_at',
    ];

    public function scopeSelection($query)
    {
        return $query ->select('id','name','price','color','size','description','cat_id','active');
    }

    public function scopeActive($query)
    {
        return $query ->where('active',1);
    }
    
    public function getActive(){
        return   $this -> active == 1 ? 'مفعل'  : 'غير مفعل';
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'cat_id', 'id');
    }

    public function images(){

        return $this -> hasMany('App\Models\Image','product_id','id');
    }
}
