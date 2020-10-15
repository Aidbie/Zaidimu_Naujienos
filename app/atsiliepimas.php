<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class atsiliepimas extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'atsiliepimas';
    protected $fillable=['pavadinimas','turinys','paskelbimo data', 'vertinimas'];
    public $timestamps = false;
}