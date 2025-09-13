<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Munro_page extends Model
{
    use Searchable;

    /**
     * @var string
     */
    protected $primaryKey = 'amid';

    protected $fillable = ['amname', 'aminfo','amchapter','amdescription', 'aminfo', 'chapter_chapid','book_bkid'];

    public function chapters_pl(): BelongsTo
    {
        return $this->belongsTo(Chapters_pl::class);
    }

    /**
     * @var array
     */
    public function toSearchableArray(): array
    {
        return [
            'aminfo' => $this->aminfo,
            'amdescription' => $this->amdescription,
        ];
    }
}
