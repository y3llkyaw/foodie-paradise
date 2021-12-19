<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function orders(){
        return $this->belongsTo(Orders::class);
    }
    public function food(){
        return $this->hasOne(Food::class);
    }
}
