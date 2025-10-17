<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use Searchable;

     protected $primaryKey = 'artid';
     protected $fillable = ['artsort','artdate','article','abstract','headline','artcredit','directory_dirid','artauthor','person_ppid','artimage','artcaption','artsidebar','arttag','tagtype','artthumb'];

  
    public function place(): HasMany
    {
        return $this->hasMany(Place::class);
    }
    public function page(): HasMany
    {
        return $this->hasMany(Page::class);
    }
    
    public function toSearchableArray(): array
    {
        return [
            'artdate' => $this->artdate,
            'article' => $this->article,
            'headline' => $this->headline,
            'artcredit' => $this->artcredit,
            'artauthor' => $this->artauthor,
            'artimage' => $this->artimage,
            'artcaption' => $this->artcaption,
            
        ];
    }
}
