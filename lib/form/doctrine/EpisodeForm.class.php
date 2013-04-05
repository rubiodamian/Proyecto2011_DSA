<?php

/**
 * Episode form.
 *
 * @package    entrega3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EpisodeForm extends BaseEpisodeForm {

    public function configure() {

        $this->widgetSchema['archivo'] = new sfWidgetFormInputFile(array(
                    'label' => 'Podcast file',
                ));

        $this->validatorSchema['archivo'] = new sfValidatorFile(array(
                    'required' => false,
                    'path' => sfConfig::get('sf_upload_dir') . '/episodes', 
                   'mime_types' => array ('audio/ogg', 'video/ogg', 'application/ogg'),
                    'required' => false));

        $user = sfContext::getInstance()->getUser();

        unset($this['created_at'], $this['updated_at'],$this['slug']);
        $user = sfContext::getInstance()->getUser();
        if (!$user->hasGroup('admin')) {
            $this->widgetSchema['Podcast_id'] = new sfWidgetFormChoice(array(
                        'choices' => Doctrine_Core::getTable('Podcast')->getPodcastOfUserChoices()
                    ));
        }
    }

}
