<?php

/**
 * unavailable actions.
 *
 * @package    entrega3
 * @subpackage unavailable
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class unavailableActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
            $this->setLayout('unavailable');
  }
}
