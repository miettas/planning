<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapters_pl extends Model
{
    use Searchable;

	protected $primaryKey = 'chapid';

    protected $fillable = ['chapname', 'chapinfo', 'book_bkid', 'chapsort'];

    public function books_pl(): BelongsTo
    {
        return $this->belongsTo(Books_pl::class);
    }

    public function page(): HasMany
    {
        return $this->hasMany(Page::class);
    }

    public function mccplan_page(): HasMany
    {
        return $this->hasMany(Mccplan_page::class);
    }

    public function green_page(): HasMany
    {
        return $this->hasMany(Green_page::class);
    }

    public function munro_page(): HasMany
    {
        return $this->hasMany(Munro_page::class);
    }

    /**
     * @var array
     */
    public function toSearchableArray(): array
    {
        return [
            'chapname' => $this->chapname,
            'chapid' => $this->chapid,
        ];
    }
}
