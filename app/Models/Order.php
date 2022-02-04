<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $guarded = ['id'];
    protected $casts = [
        'sub_total'=>'float',
        'total'=>'float',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

}
