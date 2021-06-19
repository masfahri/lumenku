<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderDetail extends Model
{
    protected $table = 'purchase_order_detail';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $hidden = [
        'po_id'
    ];

    /**
     * Get the PurchaseOrder that owns the PurchaseOrderDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function PurchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'id', 'po_id');
    }

}
