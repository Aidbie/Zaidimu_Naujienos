<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class zaidimas extends Model
{
    protected $primaryKey = 'zaidimo_kodas';
    protected $table = 'zaidimas';
    protected $fillable=['pavadinimas', 'isleidimo_data','aprasymas','zanras','fk_Kurejasimones_kodas'];
public $timestamps = false;
}
