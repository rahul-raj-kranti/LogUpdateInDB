<?php
class My_Articles_Model_Articles extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        /**
         *   Initializing the model. In the configuration file (see below)
         *   Tag <myarticles> / File Articles.php 
         */
        $this->_init("myarticles/articles");
   }
}