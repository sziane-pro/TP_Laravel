<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'contract_id',
        'date_payment_due',
        'date_payment_received',
        'amount_paid',
        'status',
        'bill_path',
    ];

    public function contract()
    {
        return $this->belongsTo(Contracts::class);
    }
}
