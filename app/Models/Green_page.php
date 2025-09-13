<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\SearchableScope;

SearchableScope Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Green_page extends Model
{
    use Searchable;

    protected $primaryKey = 'grid';

    protected $fillable = ['grname', 'grinfo','chap_name','grdescription','chap_chapid','book_bkid'];

    public function chapters_pl(): BelongsTo
    {
        return $this->belongsTo(Chapters_pl::class);
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
            'grname' => $this->grname,
            'grinfo' => $this->grinfo,
        ];
    }
}
