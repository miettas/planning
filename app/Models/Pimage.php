<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pimage extends Model
{
    use Searchable;
    
    protected $primaryKey = 'pimgid';
    protected $fillable = ['pname','ppath','pext','palt','pcaption','pcredit','width','rating','streets_street_id','street_id-2','street_id-3'];

    public function street(): BelongsTo
    {
        return $this->belongsTo(Street::class);
    }
    public function imgwidth()
    {
      list($w,$h) = getimagesize("ppath/pname.pext");
        if($h > $w){
          $width = $w / $h * 100;
          $width = "$width%";
        };
      return $width;
    }


    /**
     * @var array
     */
    public function toSearchableArray(): array
    {
        return [
            'pname' => $this->pname,
            'ppath' => $this->ppath,
            'palt' => $this->aplt,
            'pcaption' => $this->pcaption,
            'pcredit' => $this->pcredit,
            'rating' =>  $this->prating,
        ];
    }
}
