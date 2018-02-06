<?php

class Manoj_Adminform_Block_Adminhtml_Adminform_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('adminform_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('adminform')->__('adminform Information'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab(
            'form_section',
            array(
                'label' => Mage::helper('adminform')->__('Adminform Information'),
                'title' => Mage::helper('adminform')->__('Adminform Information'),
                'content' => $this->getLayout()->createBlock('adminform/adminhtml_adminform_edit_tab_form')->toHtml(),
            )
        );

        return parent::_beforeToHtml();
    }
}
