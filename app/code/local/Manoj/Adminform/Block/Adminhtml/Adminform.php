<?php

class Manoj_Adminform_Block_Adminhtml_Adminform extends Mage_Adminhtml_Block_Widget_Grid_Container
{


    public function __construct()
    {
        $this->_controller = 'adminhtml_adminform';
        $this->_blockGroup = 'adminform';
        $this->_headerText = Mage::helper('adminform')->__('Adminform Manager');
        $this->_addButtonLabel = Mage::helper('adminform')->__('Add Form');
        parent::__construct();
    }
}
