<?php

/**
 * Podcast filter form.
 *
 * @package    entrega3
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PodcastFormFilter extends BasePodcastFormFilter
{
  public function configure()
  {
      $user = sfContext::getInstance()->getUser();
        if (!$user->hasGroup('admin')) {
            unset( $this['id'],$this['visible']);
        }
        unset($this['image'],$this['updated_at'],$this['rss'],$this['visitCount'],$this['contact'],$this['description'],$this['slug']);
  }
}