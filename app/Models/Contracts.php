<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    protected $fillable = [
        'date_start',
        'date_end',
        'monthly_price',
        'boxes_id',
        'tenants_id',
        'user_id',
    ];

    // Définition des relations (adaptées à votre modèle)
    public function box()
    {
        return $this->belongsTo(Boxes::class, 'boxes_id');
    }
    
    public function tenant()
    {
        return $this->belongsTo(Tenants::class, 'tenants_id');
    }
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
