<?php

namespace Fully\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $table = 'images';

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
