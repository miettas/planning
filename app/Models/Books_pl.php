<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Books_pl extends Model
{
    use Searchable;

    protected $primaryKey = 'bkid';

    protected $fillable = ['bkname', 'bkdescription', 'bkinfo', 'bkauthor','bktype','bkthumb','publisher','isbn','datepublished'];

    public function chapters_pl(): HasMany
    {
      return $this->hasMany(Chapters_pl::class);
    }

    /**
     * @var array
     */
    protected $searchRules = [
        //
    ];

    /**
     * @var array
     */
    public function toSearchableArray(): array
    {
        return [
            'bkname' => $this->bkname,
            'bkdescription' => $this->bkdescription,
            'bkinfo' => $this->bkinfo,
            'bkauthor' => $this->bkauthor,
            'bktype' => $this->bktype,
            'bkthumb' => $this->bkthumb,
            'publisher' => $this->publisher,
            'isbn' => $this->isbn,
            'datepublished' => $this->datepublished,
        ];
    }
}
