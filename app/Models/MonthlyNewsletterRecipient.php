<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyNewsletterRecipient extends Model
{
    protected $fillable = [
        'token',
        'email',
        'is_verified'
    ];
}
