<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Directories_pl extends Model
{
    use Searchable;

    protected $primaryKey = 'dirid';
   
   protected $fillable = ['dname','infoCol1','infoCol2','infoCol3','headlineCol1','headlineCol2','headlineCol3','dirImage','dirCaption','dirDescription'];
}
