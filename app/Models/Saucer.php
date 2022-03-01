<?php

namespace App\Models;

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
}
