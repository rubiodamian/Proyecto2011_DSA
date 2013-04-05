<?php

/**
 * PageConfigTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PageConfigTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object PageConfigTable
     */
    public function getInstance() {
        return Doctrine_Core::getTable('PageConfig');
    }

    public function getTitleConfiguration() {
        $q = Doctrine_Query::create()
                ->from('PageConfig c')
                ->where('c.config = ?', 'pagetitle');
        return $q->fetchOne(array(), Doctrine_Core::HYDRATE_RECORD)->getValue();
    }

    public function getStyleConfiguration() {
        $q = Doctrine_Query::create()
                ->from('PageConfig c')
                ->where('c.config = ?', 'style');
        return $q->fetchOne(array(), Doctrine_Core::HYDRATE_RECORD)->getValue();
    }

    public function getPodcastPerPageConfiguration() {
        $q = Doctrine_Query::create()
                ->from('PageConfig c')
                ->where('c.config = ?', 'podcastperpage');
        return $q->fetchOne(array(), Doctrine_Core::HYDRATE_RECORD)->getValue();
    }

    public function getVisiblepodcastConfiguration() {
        $q = Doctrine_Query::create()
                ->from('PageConfig c')
                ->where('c.config = ?', 'visiblepodcast');
        return $q->fetchOne(array(), Doctrine_Core::HYDRATE_RECORD)->getValue();
    }

    public function getUnavailablesiteConfiguration() {
        $q = Doctrine_Query::create()
                ->from('PageConfig c')
                ->where('c.config = ?', 'unavailablesite');
        return $q->fetchOne(array(), Doctrine_Core::HYDRATE_RECORD)->getValue();
    }

}