<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemDetail extends Model
{
    protected $table = 'item_detail';

    protected $primaryKey = 'id';

    protected $guarded = [];

    /**
     * Get the Item that owns the ItemDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->hasOne(Item::class, 'item_id');
    }
}
