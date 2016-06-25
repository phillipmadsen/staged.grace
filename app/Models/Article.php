<?php

namespace Fully\Models;

use Cviebrock\EloquentSluggable\SluggableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Fully\Interfaces\ModelInterface as ModelInterface;

/**
 * Class Article.
 *
 * @author Phillip Madsen <contact@affordableprogrammer.com>
 */
class Article extends BaseModel implements ModelInterface, SluggableInterface
{
    use SluggableTrait;

    public $table = 'articles';
    protected $fillable = [
        'author_id', 'is_published', 'is_draft', 'has_product_link', 'product_link_nofollow', 'title', 'subtitle', 'excerpt', 'content', 'slug', 'meta_title', 'fb_title', 'gp_title', 'tw_title', 'meta_keywords', 'meta_description', 'path', 'file_name', 'file_size', 'category_id', 'user_id', 'link_to_product_title', 'link_to_product', 'lang'
    ];
    protected $appends = ['url'];

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to' => 'slug',
    );

    public function tags()
    {
        return $this->belongsToMany('Fully\Models\Tag', 'articles_tags');
    }

    public function category()
    {
        return $this->hasMany('Fully\Models\Category', 'id', 'category_id');
    }

    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = $value;
    }

    public function getUrlAttribute()
    {
        return 'blog/'.$this->attributes['slug'];
    }
    /**
     * Sync tag relation adding new tags as needed
     *
     * @param array $tags
     */
    public function syncTags(array $tags)
    {
      Tag::addNeededTags($tags);

      if (count($tags)) {
        $this->tags()->sync(
          Tag::whereIn('tag', $tags)->lists('id')->all()
        );
        return;
      }

      $this->tags()->detach();
    }

}
