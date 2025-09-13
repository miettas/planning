<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Place extends Model
{
    use Searchable;

    protected $primaryKey = 'plid';

    protected $fillable = ['plname','plinfo','plimage','plcaption','plauthor','pladdress','plcredit'];

    public function article(): BelongsToMany
    {
      return $this->belongsToMany('Article');
    }

    public function mimage(): BelongsToMany
    {
      return $this->belongsToMany('Mimage');
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
            'plname' => $this->plname,
            'plinfo' => $this->plinfo,
            'plauthor' => $this->plauthor,
            'pladdress' => $this->pladdress,
            'plcredit' => $this->plcredit,
        ];
    }
}
