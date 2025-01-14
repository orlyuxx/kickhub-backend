<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inventory';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'inventory_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_id',
        'product_id',
        'vendor_id',
        'quantity',
        'price',
        'reorder_threshold',
    ];

     /**
     * Relationship to the Products model.
     */
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'product_id');
    }

       /**
     * Relationship to the Vendors model.
     */
    public function vendor()
    {
        return $this->belongsTo(Vendors::class, 'vendor_id', 'vendor_id');
    }
}
