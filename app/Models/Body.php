<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Body extends Model
{
    use Searchable;

    protected $primaryKey = 'bid';
    protected $fillable = ['bname','bdescription'];

}
