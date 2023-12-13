<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'session',
        'floating_email_parent',
        'floating_email_institution',
        'floating_first_name',
        'floating_last_name',
        'floating_phone',
        'floating_company',
    ];
}