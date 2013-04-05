<?php

/**
 * Podcast form.
 *
 * @package    entrega3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PodcastForm extends BasePodcastForm {

    public function configure() {

        $this->widgetSchema['image'] = new sfWidgetFormInputFile(array(
                    'label' => 'Podcast image',
                ));

        $this->validatorSchema['image'] = new sfValidatorFile(array(
                    'required' => false,
                    'mime_types' => 'web_images',
                ));

        $user = sfContext::getInstance()->getUser();
        if (!$user->hasGroup('admin')) {
            unset($this['id'],$this['visible'],$this['visitCount']);
        }
        unset($this['created_at'], $this['updated_at'],$this['slug']);
    }

}
