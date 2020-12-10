<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table='stores';

    protected $fillable = [
        'id','name','slug','description','active','created_at','updated_at',
    ];

    public function scopeSelection($query)
    {
        return $query ->select('id','name','slug','description','active');
    }

    public function scopeActive($query)
    {
        return $query ->where('active',1);
    }

    public function getActive(){
        return   $this -> active == 1 ? 'مفعل'  : 'غير مفعل';
    }

    public function Categories(){

        return $this -> hasMany('App\Models\Category','store_id','id');
    }
}
