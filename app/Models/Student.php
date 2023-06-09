<?php

namespace App\Models;

// use App\Notifications\Admin\ResetPassword;
// use App\Notifications\Admin\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'student';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function registration() {
        return $this->hasOne(Registration::class, 'email_address', 'email');
    }

    protected $with = ['registration'];

    // /**
    //  * Auto hash password when create/update
    //  *
    //  * @param $value
    //  * @return void
    //  */
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = \Hash::needsRehash($value) ? \Hash::make($value) : $value;
    // }

    // /**
    //  * Send the password reset link notification.
    //  *
    //  * @param $token
    //  * @return void
    //  */
    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new ResetPassword($token));
    // }

    // /**
    //  * Send the email verification notification.
    //  *
    //  * @return void
    //  */
    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify(new VerifyEmail);
    // }
}
