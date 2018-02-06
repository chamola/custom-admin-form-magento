<?php

class Manoj_Adminform_Block_Adminhtml_Adminform_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'adminform';
        $this->_controller = 'adminhtml_adminform';

        $this->_updateButton(
            'save',
            'label',
            Mage::helper('adminform')->__('Save Item')
        );

        $this->_updateButton(
            'delete',
            'label',
            Mage::helper('adminform')->__('Delete Item')
        );

        $this->_addButton(
            'saveandcontinue',
            array(
                'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
                'onclick' => 'saveAndContinueEdit()',
                'class' => 'save',
            ),
            -100
        );

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('adminform_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'adminform_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'adminform_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if (Mage::registry('adminform_data') && Mage::registry('adminform_data')->getId()) {
            return Mage::helper('adminform')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('adminform_data')->getId()));
        }
        else {
            return Mage::helper('adminform')->__('Add Item');
        }
    }
}
