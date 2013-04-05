<?php

/**
 * PodcastTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PodcastTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object PodcastTable
     */
    public static function getLuceneIndex() {
        ProjectConfiguration::registerZend();

        if (file_exists($index = self::getLuceneIndexFile())) {
            return Zend_Search_Lucene::open($index);
        } else {
            return Zend_Search_Lucene::create($index);
        }
    }

    public static function getLuceneIndexFile() {
        return sfConfig::get('sf_data_dir') . DIRECTORY_SEPARATOR . 'podcast.index';
    }

    public static function getInstance() {
        return Doctrine_Core::getTable('Podcast');
    }

    public function getForLuceneQuery($query) {
        $hits = $this->getLuceneIndex()->find($query);

        $pks = array();
        foreach ($hits as $hit) {
            $pks[] = $hit->pk;
        }

        if (empty($pks)) {
            return array();
        }
        $po = new Podcast;
        $q = Doctrine_Query::create()
                ->from('Podcast p')
                ->whereIn('p.id ', $pks);


        return $q->execute();
    }

    public function getPodcastOfUser() {
        $user = sfContext::getInstance()->getUser()->getGuardUser();

        $q = Doctrine_Query::create()
                ->from('podcast p');
        if (!$user->hasGroup('admin')) {
            $q = Doctrine_Query::create()
                            ->from('podcast p')
                            ->innerJoin('p.Owner o')
                            ->innerJoin('o.User s')->Where('s.id = ?', $user->getId());
        }
        return $q;
    }

    public function getPodcastOfUserChoices() {
        $choices = Array();
        $pod = $this->getPodcastOfUser()->execute(array(), Doctrine_Core::HYDRATE_RECORD);
        foreach ($pod as $array => $pod) {
            $choices[$pod->getId()] = $pod->getName();
        }
        return $choices;
    }

    public function getEpisodesPodcast($id) {
        $q = Doctrine_Query::create()
                ->from('episode e')
                ->where('e.podcast_id = ?', $id)
                ->orderBy('e.created_at');
        return $q;
    }

    public function getPodcastSorted($sort=null) {
        $q = $this->createQuery('p');

        if ($sort == 'owner') {
            $q->innerJoin('p.Owner o')
                    ->innerJoin('o.User s')
                    ->orderBy('s.username');
        } else {
            if ($sort == 'category') {
                $q->innerJoin('p.Category c')
                        ->orderBy('c.slug');
            } else {
                if ($sort == 'name') {
                    $q->orderBy('p.name');
                }else{
                    $q->orderBy('p.created_at');
                }
            }
        }
        return $q;
    }

    public function getPodcastOfCategory($id) {
        $q = $this->createQuery('p')
                ->where('p.category_id = ?', $id)
                ->orderBy('p.created_at,p.name');
        return $q;
    }

}