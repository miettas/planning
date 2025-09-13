<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Street extends Model
{
    use Searchable;

    protected $primaryKey = 'id';
    protected $fillable = ['street','streetname','street_info'];

    public function pimage(): HasMany
    {
      return $this->hasMany(Pimage::class, 'streets_street_id');
    }

    /**
     * @var array
     */
    public function toSearchableArray(): array
    {
        return [
            'street' => $this->street,
            'streetname' => $this->street_name,
            'street_info' => $this->street_info,
        ];
    
    }
}
