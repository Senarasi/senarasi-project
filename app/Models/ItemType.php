<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    use HasFactory;
    protected $primaryKey = 'item_type_id';
    protected $fillable = [
        'item_category_id',
        'item_type_name',
    ];

    public function itemTool(){
        return $this->hasMany(ItemTool::class, 'item_type_id');
    }

    public function itemCategory(){
        return $this->belongsTo(ItemCategory::class, 'item_category_id');
    }
}
