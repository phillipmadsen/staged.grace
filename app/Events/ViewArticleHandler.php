<?php

namespace Fully\Events;

use Fully\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Session\Store;

use Fully\Models\Article;

class ViewArticleHandler extends Event
{
    use SerializesModels;

 private $session;

    public function __construct(Store $session)
    {
        // Let Laravel inject the session Store instance,
        // and assign it to our $session variable.
        $this->session = $session;
    }

    public function handle(Article $article)
    {
        if ( ! $this->isArticleViewed($article))
        {
            $article->increment('view_counter');
            $article->view_counter += 1; 
            
            $this->storeArticle($article);
        }
    }


    private function isArticleViewed($article)
    {
        // Get all the viewed articles from the session. If no
        // entry in the session exists, default to an
        // empty array.
        $viewed = $this->session->get('viewed_articles', []);

        // Check the viewed articles array for the existance
        // of the id of the post
        return in_array($article->id, $viewed);
    }

    private function storeArticle($article)
    {    
        // Push the article id onto the viewed_articles session array.
        $this->session->push('viewed_articles', $article->id);
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
