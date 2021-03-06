<?php

/**
 * Episode
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    entrega3
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Episode extends BaseEpisode {

    public function getTitleSlug() {
        return Util::slugify($this->getTitle());
    }
    
    public function getPodcastSlug() {
        return $this->getPodcast()->getNameSlug();
    }
    
    public function getCategorySlug() {
        return $this->getPodcast()->getCategory()->getNameSlug();
    }

    public function setTitle($name) {
        $this->setSlug(Util::slugify($name));
        return $this->_set('title', $name);
    }

}