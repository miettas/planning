<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use Searchable;

    protected $primaryKey = 'pid';

    protected $fillable = ['pname', 'pinfo', 'chapter_chapid','pchapter_name','pdescription','book_bkid'];


    public function chapters_pl(): BelongsTo
    {
        return $this->belongsTo(Chapters_pl::class);
    }
    public function books_pl(): BelongsTo
    {
        return $this->belongsTo(Books_pl::class);
    }
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    /**
     * @var array
     */
    public function toSearchableArray(): array
    {
        return [
            'pname' => $this->pname,
            'pinfo' => $this->pinfo,
            'pdescription' => $this->pdescription,
        ];
    }
}
