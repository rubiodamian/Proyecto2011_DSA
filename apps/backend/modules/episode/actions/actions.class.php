<?php

require_once dirname(__FILE__) . '/../lib/episodeGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/episodeGeneratorHelper.class.php';

/**
 * episode actions.
 *
 * @package    entrega3
 * @subpackage episode
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class episodeActions extends autoEpisodeActions {

    public function executeEdit(sfWebRequest $request) {
        $ok = FALSE;
        $user_id = $this->getUser()->getGuardUser()->getId();
        $owners = $this->getRoute()->getObject()->getPodcast()->getOwners();
        if (!$this->getUser()->hasGroup('admin')) {
            foreach ($owners as $owner) {

                if ($owner->getId() == $user_id) {
                    $ok = TRUE;
                }
            }

            if ($ok)
                parent::executeEdit($request);
            else
                $this->forward('episode', 'index');
        }
        else {
            parent::executeEdit($request);
        }
    }

}
