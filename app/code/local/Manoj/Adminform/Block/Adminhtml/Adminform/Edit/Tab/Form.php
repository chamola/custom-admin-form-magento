<?php

class Manoj_Adminform_Block_Adminhtml_Adminform_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset(
            'adminform_form',
            array(
                'legend'=>Mage::helper('adminform')->__('Adminform information')
            )
        );

        $fieldset->addField( 
            'name',
            'text',
            array(
                'label' => Mage::helper('adminform')->__('Name'),
                'class' => 'required-entry',
                'required' => true,
                'name' => 'name',
            )
        );

        $fieldset->addField(
            'description',
            'text',
            array(
                'label' => Mage::helper('adminform')->__('Description'),
                'class' => 'required-entry',
                'required' => true,
                'name' => 'description',
            )
        );

        $fieldset->addField(
            'phone',
            'text',
            array(
                'label' => Mage::helper('adminform')->__('Phone'),
                'class' => 'required-entry',
                'required' => true,
                'name' => 'phone',
            )
        );
		
		

        $fieldset->addField(
            'status',
            'select',
            array(
                'label' => Mage::helper('adminform')->__('Status'),
                'name' => 'status',
                'values' => array(
                    array(
                        'value' => 1,
                        'label' => Mage::helper('adminform')->__('Enabled'),
                    ),

                    array(
                        'value' => 2,
                        'label' => Mage::helper('adminform')->__('Disabled'),
                    ),
                ),
            )
        );


        if (Mage::getSingleton('adminhtml/session')->getAdminformData()) {
            $form->setValues(
                Mage::getSingleton('adminhtml/session')->getAdminformData()
            );
            Mage::getSingleton('adminhtml/session')->setAdminformData(null);
        }
        elseif (Mage::registry('adminform_data')) {
            $form->setValues(
                Mage::registry('adminform_data')->getData()
            );
        }

        return parent::_prepareForm();
    }
}
