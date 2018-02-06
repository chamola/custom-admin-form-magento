<?php

class Manoj_Adminform_Model_Mysql4_Adminform_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('adminform/adminform');
    }
}
