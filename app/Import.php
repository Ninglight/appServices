<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $table = 'imports';
    protected $fillable = ['filename', 'header', 'data'];
    protected $timestamps = true;
}
