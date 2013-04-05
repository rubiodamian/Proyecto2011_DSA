<?php

require_once dirname(__FILE__) . '/../lib/podcastGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/podcastGeneratorHelper.class.php';

/**
 * podcast actions.
 *
 * @package    entrega3
 * @subpackage podcast
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class podcastActions extends autoPodcastActions {

    public function executeEdit(sfWebRequest $request) {

        $ok = FALSE;
        $user_id = $this->getUser()->getGuardUser()->getId();
        $owners = $this->getRoute()->getObject()->getOwners();
        if (!$this->getUser()->hasGroup('admin')) {
            foreach ($owners as $owner) {

                if ($owner->getId() == $user_id) {
                    $ok = TRUE;
                }
            }

            if ($ok)
                parent::executeEdit($request);
            else
                $this->forward('podcast', 'index');
        }
        else {
            parent::executeEdit($request);
        }
    }

}

