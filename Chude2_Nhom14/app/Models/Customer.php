<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $filltable = [
        'customer_name','customer_password','customer_email','customer_phone','customer_address'
    ];
    protected $primaryKey = 'customer_id';
    protected $table = 'tbl_customer';
}
