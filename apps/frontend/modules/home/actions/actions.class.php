<?php

/**
 * home actions.
 *
 * @package    entrega3
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {

        if (Doctrine_Core::getTable('PageConfig')->getUnavailablesiteConfiguration()) {
            $this->forward('unavailable', 'index');
        } else {
            $this->pager = new sfDoctrinePager('Podcast', Doctrine_Core::getTable('PageConfig')->getPodcastPerPageConfiguration());
            $this->pager->setQuery(Doctrine_Core::getTable('Podcast')->getPodcastSorted($this->sort = $request->getParameter('sort')));
            $this->pager->setPage($request->getParameter('page', 1));
            $this->pager->init();
            $this->url = $request->getParameterHolder()->getAll();
        }
    }

    public function executeSearch(sfWebRequest $request) {
        if (Doctrine_Core::getTable('PageConfig')->getUnavailablesiteConfiguration()) {
            $this->forward('unavailable', 'index');
        } else {
            $this->forwardUnless($query = $request->getParameter('query'), 'home', 'index');
            $podcastSearch = Doctrine_Core::getTable('Podcast')->getForLuceneQuery("%$query%");
            $this->pager = new sfDoctrinePager('Podcast', Doctrine_Core::getTable('PageConfig')->getPodcastPerPageConfiguration());
            $pks = array();
            foreach ($podcastSearch as $hit) {
                $pks[] = $hit->id;
            }
            $this->pager->getQuery()->from('Podcast p')
                    ->whereIn('p.id ', $pks);
            $this->pager->setPage($request->getParameter('page', 1));
            $this->pager->init();

            $this->url = $request->getParameterHolder()->getAll();
            $this->setTemplate('index');
        }
    }

    public function executeCategory(sfWebRequest $request) {
        if (Doctrine_Core::getTable('PageConfig')->getUnavailablesiteConfiguration()) {
            $this->forward('unavailable', 'index');
        } else {
            $this->category = $this->getRoute()->getObject();
            $this->pager = new sfDoctrinePager('Podcast', Doctrine_Core::getTable('PageConfig')->getPodcastPerPageConfiguration());
            $this->pager->setQuery(Doctrine_Core::getTable('Podcast')->getPodcastOfCategory($this->category->getId()));
            $this->pager->setPage($request->getParameter('page', 1));
            $this->pager->init();
            $this->url = $request->getParameterHolder()->getAll();
        }
    }

}
