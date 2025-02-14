<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boxes extends Model
{
    protected $fillable = [
        'name',
        'address',
        'price',
        'size',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
