<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hotelNo',
        'hotelName',
        'username',
        'email',
        'tel',
        'address1',
        'payment_method',
        'credit_card_number',
        'cardholder_name',
        'expiry_date',
        'security_code',
        'bank_name',
        'branch_name',
        'account_type',
        'account_number',
        'account_holder',
    ];
}
