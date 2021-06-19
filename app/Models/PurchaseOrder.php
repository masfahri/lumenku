<?php

namespace App\Models;

use App\Models\PurchaseOrderItem;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table = 'purchase_orders';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $hidden = [
        'item'
    ];
    // Set Customer JSON_ENCODE to JSON_DECODE
    protected $casts = [
        'customer' => 'array',
    ];
    
    /**
     * Get all of the PurchaseOrderItem for the PurchaseOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Items()
    {
        return $this->hasMany(PurchaseOrderItem::class, 'po_id');
    }

    /**
     * Get the Detail associated with the PurchaseOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Detail()
    {
        return $this->hasOne(PurchaseOrderDetail::class, 'po_id');
    }

}
