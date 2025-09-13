<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class People_pl extends Model
{
    use Searchable;

    protected $primaryKey = 'ppid';

    protected $fillable = ['first', 'last', 'salutation', 'honorifics','ppcredit','biography','ppimage','ppcaption','ppcomments','pptag','ppsidebar','directory_dirid','person_ppid','ppsidebar','type'];

   public function article(): BelongsToMany
    {
      return $this->belongsToMany('App\Models\Article');
    }

    public function mimage(): BelongsToMany
    {
      return $this->belongsToMany('App\Models\Mimage');
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
            'first' => $this->first,
            'last' => $this->last,
            'honorifics' => $this->honorifics,
            'ppcredit' => $this->ppcredit,
            'biography' => $this->biography,
            'ppimage' => $this->ppimage,
            'ppcaption' => $this->ppcaption,
            'pptag' => $this->pptag,
            'ppsidebar' => $this->ppsidebar,
            'type' => $this->type,
        ];
    }
}
