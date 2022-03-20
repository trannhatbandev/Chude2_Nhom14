<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $filltable = [
        'size_name','size_description','size_status'
    ];
    protected $primaryKey = 'size_id';
    protected $table = 'tbl_size'; 
}
