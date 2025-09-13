<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mimage extends Model
{
    use Searchable;

    protected $primaryKey = 'imgid';
    protected $fillable = ['imgname','imgpath','imgext','alt','caption','credit','person_ppid','place_plid','article_artid'];

    public function article(): BelongsTo
    {
      return $this->belongsTo(Article::class, 'article_artid');
    }

    public function people_pl(): BelongsToMany
    {
      return $this->belongsToMany(Person::class, 'people_pl_ppid');
    }

    public function place(): BelongsToMany
    {
      return $this->belongsToMany(Place::class, 'place_plid');
    }

    public function imgwidth()
    {
      list($w,$h) = getimagesize("imgpath/imgname.imgextension");
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
            'imgname' => $this->imgname,
            'imgpath' => $this->imgpath,
            'alt' => $this->alt,
            'caption' => $this->caption,
            'credit' => $this->credit,
        ];
    }
}
