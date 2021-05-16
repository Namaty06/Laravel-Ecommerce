<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{  
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'image',
        'quantity',
        'category_id'
    ];
  
    public function category(){

        return $this->belongsTo(Category::class);
    }
    
    public function Order()
    {
        return $this->belongsToMany(Order::class);
    }
    public function feedback(){
 
        return $this->hasMany(Feedback::class);        
 
    }

}
