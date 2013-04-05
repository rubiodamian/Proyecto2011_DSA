<?php

/**
 * Episode filter form.
 *
 * @package    entrega3
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EpisodeFormFilter extends BaseEpisodeFormFilter
{
  public function configure()
  {
            unset($this['updated_at'],$this['archivo'],$this['description'],$this['slug']);
  }
}
