<?php
class My_Articles_Model_Resource_Articles extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        /*
            Initialize the resource model.
            In the configuration file (see below)
            Tag    <myarticles> / tag <table_myarticles>
            id - field name with Primary Key
        */
        $this->_init("myarticles/table_myarticles", "id");
    }
    /**
     * Function is called after data is deleted
     * Here we delete the picture file
     * @return Mage_Core_Model_Resource_Db_Abstract
     */
    protected function _afterDelete()
    {
        $helper = Mage::helper('myarticles');
        @unlink($helper->getImagePath($this->getId()));
        return parent::_afterDelete();
    }
    /**
     * The function returns the path to the image
     * We will use our helper for this
     * @return null
     */
    public function getImageUrl()
    {
        $helper = Mage::helper('myarticles');
        if ($this->getId() && file_exists($helper->getImagePath($this->getId()))) {
            return $helper->getImageUrl($this->getId());
        }
        return null;
    }
}