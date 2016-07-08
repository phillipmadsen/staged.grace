<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];
    protected $table = 'product_images';

    public $fillable = [
        'original_name',
        'filename',
        'product_id',
        'path',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'original_name' => 'text',
        'filename'      => 'text',
        'product_id'    => 'integer',
        'path'          => 'string'
    ];

}
