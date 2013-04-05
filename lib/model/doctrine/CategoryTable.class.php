<?php

/**
 * CategoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CategoryTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object CategoryTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('Category');
    }

    public function selectMethod($parameters) {
        $q = $this->createQuery('c')
                ->where('c.slug = ?', $parameters['name_slug']);
        return $q->fetchOne();
    }

    public function getCategoryNames() {
        $q = $this->createQuery('c')
                ->innerJoin('c.Podcast');
        return $q->execute();
    }

}