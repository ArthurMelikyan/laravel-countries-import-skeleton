<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    /**
     * @return HasMany
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
