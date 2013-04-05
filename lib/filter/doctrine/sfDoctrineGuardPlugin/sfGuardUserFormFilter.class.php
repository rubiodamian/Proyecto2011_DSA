<?php

/**
 * sfGuardUser filter form.
 *
 * @package    entrega3
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserFormFilter extends PluginsfGuardUserFormFilter
{
  public function configure()
  {
       unset($this['updated_at'],$this['last_login'],$this['password'],$this['salt'],$this['algorithm'], $this['email_address'],$this['permissions_list'],$this['first_name'],$this['last_name']);
  }
}
