<?php

/**
 * category module configuration.
 *
 * @package    entrega3
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryGeneratorConfiguration extends BaseCategoryGeneratorConfiguration
{
    public function getPagerMaxPerPage() {
        parent::getPagerMaxPerPage();
        return Doctrine_Core::getTable('PageConfig')->getPodcastPerPageConfiguration();
    }
}
