<?php

class componentsComponents extends sfComponents {

    public function executeTitle() {

        $this->title = Doctrine_Core::getTable('PageConfig')->getTitleConfiguration();
    }

    public function executeStyle() {

        $this->style = Doctrine_Core::getTable('PageConfig')->getStyleConfiguration();
    }

    public function executeIsAdmin() {

        $user = $this->getUser();
        $this->isAdmin = $user->hasGroup('admin');
    }

}

?>
