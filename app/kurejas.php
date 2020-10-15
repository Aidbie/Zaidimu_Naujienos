<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kurejas extends Model
{
    protected $primaryKey = 'imones_kodas';
    protected $table = 'kurejas';
    protected $fillable=['pavadinimas','ikurimo_data','aprasymas'];
    public $timestamps = false;
}

