<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Objection extends Model
{
    use Searchable;

    protected $primaryKey = 'objid';

    protected $fillable = ['objname', 'jurisdiction', 'plnNum', 'objremarks'];
}
