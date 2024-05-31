<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $primaryKey = 'vendor_id';
    protected $fillable = ['vendor_name', 'vendor_pic', 'vendor_contact', 'vendor_email', 'vendor_address', 'vendor_npwp'];
    use HasFactory;

    public function itemsvendor()
    {
        return $this->hasMany(ItemVendor::class);
    }
}
