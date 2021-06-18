<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $guarded = [];

    /**
     * Get the Detail associated with the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Detail()
    {
        return $this->hasOne(ItemDetail::class, 'item_id', 'id');
    }
}
