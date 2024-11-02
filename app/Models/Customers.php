<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;
    Protected $table="customers";
    Protected $fillable=[
        'name',
        'email',
        'phonenumber',
        'premiumamount',
        'gstpercent',
        'gstamount',
        'totalpremiumamount',
    ];
}
