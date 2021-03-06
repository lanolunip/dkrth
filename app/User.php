<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\VerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'email', 'password','tipe_user','nomor_telepon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail); // my notification
    } 

    public function TipeUser(){
        return $this->belongsTo('App\TipeUser','tipe_user');
    }

    public function isAdmin()
    {
        if($this->tipe_user == 1)
        { 
            return true; 
        } 
        else 
        { 
            return false; 
        }
    }

    public function hasRole($role)
    {
        if($this->TipeUser->nama == $role){
            return true;
        }else{
            return false;
        } 
    }
    
}
