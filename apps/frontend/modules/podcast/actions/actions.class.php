<?php

/**
 * podcast actions.
 *
 * @package    entrega3
 * @subpackage podcast
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class podcastActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {

        if (Doctrine_Core::getTable('PageConfig')->getUnavailablesiteConfiguration()) {
            $this->forward('unavailable', 'index');
        } else {
            $this->style = Doctrine_Core::getTable('PageConfig')->getStyleConfiguration();
            $this->pager = new sfDoctrinePager('Podcast', Doctrine_Core::getTable('PageConfig')->getPodcastPerPageConfiguration());
            $this->podcast = $this->getRoute()->getObject();
            $this->upVisitCount($this->podcast);
            $this->pager->setQuery(Doctrine::getTable('Podcast')->getEpisodesPodcast($this->podcast->getId()));
            $this->pager->setPage($request->getParameter('page', 1));
            $this->pager->init();
            $this->url = $request->getParameterHolder()->getAll();
        }
    }

    public function upVisitCount($podcast) {
        $podcast->setVisitCount($podcast->getVisitCount() + 1);
        $podcast->save();
    }

}
