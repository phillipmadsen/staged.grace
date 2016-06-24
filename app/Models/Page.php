<?php

namespace Fully\Models;

use Cviebrock\EloquentSluggable\SluggableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Fully\Interfaces\ModelInterface as ModelInterface;

/**
 * Class Page.
 *
 * @author Phillip Madsen <contact@affordableprogrammer.com>
 */
class Page extends BaseModel implements ModelInterface, SluggableInterface
{
    use SluggableTrait;

    public $table = 'pages';

    public $fillable = [
        'is_published',
        'is_draft',
        'has_product_link',
        'product_link_nofollow',
        'layout',
        'title',
        'subtitle',
        'excerpt',
        'content',
        'slug',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'fb_title',
        'gp_title',
        'tw_title',
        'link_to_product_title',
        'link_to_product',
        'path',
        'file_name',
        'file_size',
        'lang',
        'author',
        'section_id',
        'published_at',
        'added_on'
    ];


    protected $appends = ['url'];

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to' => 'slug',
    );

    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = $value;
    }

    public function getUrlAttribute()
    {
         return "/" . $this->attributes['slug'];
    }



    /**
     * Set the HTML content automatically when the raw content is set
     *
     * @param string $value
     */
    public function setContentRawAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content_raw'] = $value;
        $this->attributes['content_html'] = $markdown->toHTML($value);
    }
}
