<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use Uuids;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_date',
        'payment_type',
        'total',
        'status',
        'generate_qr',
        'cust_name',
        'table_no',
        'order_type',
        'trx_no',
        'payment_method',
        'bayar',
        'kembalian',
        'note',
    ];

    public function paymentDetails()
    {
        return $this->hasMany(PaymentDetail::class, 'payment_id');
    }
}
