<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AttributeSku extends Pivot
{
    public function property(): BelongsTo {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
