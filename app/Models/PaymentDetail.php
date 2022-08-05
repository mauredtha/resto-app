<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use Uuids;
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'menu_id',
        'qty',
        'price',
    ];
}
