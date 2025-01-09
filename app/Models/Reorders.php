<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reorders extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reorders';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'reorder_id';

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
        'reorder_date',
        'status',
    ];
}
