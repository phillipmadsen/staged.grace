<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Product extends Model implements SluggableInterface
{
    use SluggableTrait;
    use SoftDeletes;

    public $table = 'products';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public $fillable = [
        'slug', 'is_published',  'sku', 'upc', 'mpn', 'name', 'subtitle', 'short_description', 'description', 'category',   'price',  'sale_price',  'pubished_at', 'created_at', 'updated_at', 'images', 'image', 'product_image'
    ];

    protected $casts = [
        'slug'              => 'string',
        'is_published'      => 'boolean',
        'sku'               => 'string',
        'upc'               => 'string',
        'name'              => 'string',
        'subtitle'          => 'string',
        'short_description' => 'string',
        'description'       => 'string',
        'category'          => 'string',
        'sale_price'        => 'integer',
        'images'            => 'string',
        'image'             => 'string',
        'product_image'     => 'string'
    ];


    public static $rules = ['name' => 'required'];

    protected $sluggable = ['build_from' => 'name', 'save_to' => 'slug'];

    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = $value;
    }

    public function getUrlAttribute()
    {
        return 'shop / ' . $this->attributes['slug'];
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function category()
    {
        $categories = $this->hasOne(Category::class, 'id', 'category_id')->select(['id', 'title']);

        return $categories;
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function features()
    {
        return $this->hasMany(ProductFeature::class);
    }

    public function cat()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function productFeatures()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function salesOrderProduct()
    {
        return $this->hasMany(SaleorderProduct::class, 'product_id');
    }

    public function invoiceProduct()
    {
        return $this->hasMany(InvoiceProduct::class, 'product_id');
    }

    public function User()
    {
        return $this->belongsToMany(User::class);
    }

    public function images()
	{
	    return $this->hasMany(ProductImage::class);
	}
}
