<?php

/**
 * episode actions.
 *
 * @package    entrega3
 * @subpackage episode
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class episodeActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        if (Doctrine_Core::getTable('PageConfig')->getUnavailablesiteConfiguration()) {
            $this->forward('unavailable', 'index');
        } else {
            $this->episode = $this->getRoute()->getObject();
        }
    }

}
