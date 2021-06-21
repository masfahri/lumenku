<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $hidden = [
        'created_at', 'updated_at', '_meta'
    ];
    
    /**
     * Get the details associated with the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail()
    {
        return $this->hasOne('App\Models\ItemDetail', 'item_id');
    }

    /**
     * Get the PurchaseOrderItems that owns the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function PurchaseOrderItems()
    {
        return $this->belongsToMany(PurchaseOrderItems::class, 'item_ids');
    }
}
