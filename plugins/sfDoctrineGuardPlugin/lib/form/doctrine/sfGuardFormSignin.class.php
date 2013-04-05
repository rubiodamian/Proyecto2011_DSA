<?php

/**
 * sfGuardFormSignin for sfGuardAuth signin action
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardFormSignin.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardFormSignin extends BasesfGuardFormSignin
{
  /**
   * @see sfForm
   */
  public function configure()
  {
              // Configuracion de FormSchemaFormatter para que respete nuestra estructura de formularios
        $oDecorator = new sfWidgetFormSchemaFormatterDiv($this->getWidgetSchema());
        $this->getWidgetSchema()->addFormFormatter('div', $oDecorator);
        $this->getWidgetSchema()->setFormFormatterName('div');
  }
}
