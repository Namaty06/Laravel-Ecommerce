<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'product_id',
        'user_id'
    ];
  
    public function product(){

        return $this->belongsTo(Product::class);

    }
    public function user(){

        return $this->belongsTo(User::class);

    }
}
