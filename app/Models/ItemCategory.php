<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'item_category_id';
    protected $fillable = [
        'item_category_name',
        'sub_description_id',
    ];

    public function itemType(){
        return $this->hasMany(ItemType::class, 'item_category_id');
    }
}
