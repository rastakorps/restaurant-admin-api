<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Saucer extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'status'
    ];

    /**
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function(self $model) {
            $model->status = 1;
        });
    }

    /**
     * The orders that belong to the saucer.
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_saucer')->withPivot('quantity');
    }
}
