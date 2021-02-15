<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\VerifyEmail;

class Petugas extends Model 
{

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['nama','alamat','nip','nomor_telepon','email','tipe_user', 'password'];

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
