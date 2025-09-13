<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mccplan_page extends Model
{
    use Searchable;

    protected $primaryKey = 'mccid';

    protected $fillable = ['mccname', 'mccinfo','chapter','mccdescription', 'chapters_pl_chapid','books_pl_bkid'];

    public function chapters_pl(): BelongsTo
    {
        return $this->belongsTo('App\Models\Chapters_pl', 'chapters_pl_chapid');
        //return $this->belongsTo(Chapters_pl::class);
    }
    
    /**
     * @var array
     */
    public function toSearchableArray(): array
    {
        return [
            'mccinfo' => $this->mccinfo,
            'mccdescription' => $this->mccdescription,
        ];
    }
}
