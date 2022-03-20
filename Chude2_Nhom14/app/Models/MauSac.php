<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MauSac extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $filltable = [
        'color_name','color_code','color_status'
    ];
    protected $primaryKey = 'color_id';
    protected $table = 'tbl_color'; 
}
