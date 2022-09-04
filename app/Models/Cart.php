<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /* can use factory */
    use HasFactory;
    /* specifing table name */
    protected $table = 'cart';
    
}
