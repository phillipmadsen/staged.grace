<?php

namespace Fully\Models;
use Fully\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var string
     */
    protected $table = 'product_images';

    /**
     * @var array
     */
    public $fillable = [
        'original_name',
        'filename',
        'product_id',
        'path',
        'created_at',
        'updated_at'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'original_name' => 'text',
        'filename'      => 'text',
        'product_id'    => 'integer',
        'path'          => 'string'
    ];

}
