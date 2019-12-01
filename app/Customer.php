<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomerResetNotification;

class Customer extends Authenticatable
{
    use Notifiable;
    protected $guard = 'customer';

    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'email',
        'password',
        'phone',
        'street_address',
        'district',
        'zip'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetNotification($token));
    }
}
