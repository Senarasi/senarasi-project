<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemVendor extends Model
{
    protected $table = 'items_vendor';
    protected $primaryKey = 'item_vendor_id';
    protected $fillable = ['item_name', 'item_description', 'item_price', 'vendor_id'];
    use HasFactory;

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
