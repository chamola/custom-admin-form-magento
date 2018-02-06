<?php

class Manoj_Adminform_Model_Mysql4_Adminform extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        // Note that the id refers to the key field in your database table.
        $this->_init('adminform/adminform', 'id');
    }
}
