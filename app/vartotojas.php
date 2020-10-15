<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class vartotojas extends Authenticatable
{
    use Notifiable;
    protected $table = 'vartotojas';
    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $fillable = ['username','password','email','uzsiregistravimo_data'];
    protected $hidden = [
        'password',
    ];
    public function getAuthPassword()
    {
        return $this->password;
    }
    public $timestamps = false;
}