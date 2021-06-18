<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $primaryKey = 'id';

    protected $guarded = [];
    
    /**
     * Get the detail associated with the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function details()
    {
        return $this->join('item_detail', 'items.id', '=', 'item_detail.item_id')->where('')->get();
    }

    /**
     * Get the details associated with the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail()
    {
        return $this->hasMany('App\Models\ItemDetail', 'item_id');
    }
}
