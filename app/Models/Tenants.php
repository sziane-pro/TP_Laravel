<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenants extends Model
{
    protected $fillable = [
        'lastname',
        'firstname',
        'email',
        'phone',
        'address',
        'IBAN',
        'user_id'
    ];

    public function box()
    {
        return $this->belongsTo(Boxes::class);
    }
}
