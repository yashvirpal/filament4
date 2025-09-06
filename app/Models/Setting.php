<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'account_holder',
        'account_number',
        'bank',
        'branch',
        'neft_details',
        'gpay',
        'paytm',
        'helpline_number',
    ];
}
