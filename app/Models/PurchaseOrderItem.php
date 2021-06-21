<?php

namespace App\Models;

use App\Models\PurchaseOrder;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    protected $table = 'purchase_order_items';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $hidden = [
        'po_id', 'created_at', 'updated_at'
    ];

    /**
     * Get the PurchaseOrder that owns the PurchaseOrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function PurchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'po_id');
    }

    /**
     * Get the Item associated with the PurchaseOrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Item()
    {
        return $this->hasOne(Item::class, 'id', 'item_id');
    }
    
}
