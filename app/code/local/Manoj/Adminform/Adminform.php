<?php

class Manoj_Adminform_Model_Adminform extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('adminform/adminform');
    }
}
