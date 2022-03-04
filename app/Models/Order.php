<?php

namespace App\Models;

use App\Models\Saucer;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'total',
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
            $model->total = 0;
        });
    }

    /**
     * The saucers that belong to the order.
     */
    public function saucers()
    {
        return $this->belongsToMany(Saucer::class, 'order_saucer')->withPivot('quantity');
    }

    public function saveSaucers($orderSaucers)
    {
        $total = 0;
        foreach ($orderSaucers as $orderSaucer) {
            $saucer = Saucer::find($orderSaucer['id']);
            $total += ($saucer->price * $orderSaucer['quantity']);
            $this->saucers()->attach($saucer->id, ['quantity' => $orderSaucer['quantity']]);
        }
        $this->update(['total' => $total]);
        return true;
    }
}
