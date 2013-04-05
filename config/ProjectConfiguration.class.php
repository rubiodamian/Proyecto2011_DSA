<?php

require_once '/opt/symfony/lib/autoload/sfCoreAutoload.class.php';
//require_once 'C://xampp//php//PEAR//symfony/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration {

    static protected $zendLoaded = false;

    public function setup() {
        $this->enablePlugins('sfDoctrinePlugin');
        $this->enablePlugins('sfDoctrineGuardPlugin');
      $this->enablePlugins('sfImageTransformPlugin');
  }

    static public function registerZend() {
        if (self::$zendLoaded) {
            return;
        }

        set_include_path(sfConfig::get('sf_lib_dir').DIRECTORY_SEPARATOR.'vendor' . PATH_SEPARATOR . get_include_path());
        require_once sfConfig::get('sf_lib_dir') .DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'Zend'.DIRECTORY_SEPARATOR.'Loader'.DIRECTORY_SEPARATOR.'Autoloader.php';
        Zend_Loader_Autoloader::getInstance();
        self::$zendLoaded = true;
    }

}
