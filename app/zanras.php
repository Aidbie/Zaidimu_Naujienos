<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class zanras extends Model
{
    protected $primaryKey = 'id_Zanras';
    protected $table = 'zanras';
    protected $fillable=['name'];
    public $timestamps = false;
}