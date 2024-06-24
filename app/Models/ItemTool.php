<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTool extends Model
{
    use HasFactory;
    protected $primaryKey = 'item_tool_id';
    protected $fillable = [
        'item_type_id',
        'item_tool_name',
        'item_tool_description',
        'item_price'
    ];

    public function itemType(){
        return $this->belongsTo(ItemTool::class, 'item_type_id');
    }
}
