<?php

class Manoj_Adminform_Block_Adminform extends Mage_Core_Block_Template
{
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getAdminform()
    {
        if (!$this->hasData('adminform')) {
            $this->setData('adminform', Mage::registry('adminform'));
        }

        return $this->getData('adminform');
    }
}
