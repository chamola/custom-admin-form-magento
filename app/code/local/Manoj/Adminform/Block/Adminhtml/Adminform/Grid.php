<?php

class Manoj_Adminform_Block_Adminhtml_Adminform_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('adminformGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        
        $collection = Mage::getModel('adminform/adminform')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn(
            'id',
            array(
                'header' => Mage::helper('adminform')->__('ID'),
                'align' =>'right',
                'width' => '50px',
                'index' => 'id',
            )
        );

        $this->addColumn(
            'name',
            array(
                'header' => Mage::helper('adminform')->__('Name'),
                'align' =>'left',
                'index' => 'name',
            )
        );

        $this->addColumn(
            'description',
            array(
                'header' => Mage::helper('adminform')->__('Description'),
                'align' =>'left',
                'index' => 'description',
            )
        );

        $this->addColumn(
            'phone',
            array(
                'header' => Mage::helper('adminform')->__('Phone'),
                'align' =>'left',
                'index' => 'phone',
            )
        );
        

        $this->addColumn(
            'status',
            array(
                'header' => Mage::helper('adminform')->__('Status'),
                'align' => 'left',
                'width' => '80px',
                'index' => 'status',
                'type' => 'options',
                'options' => array(
                    1 => 'Enabled',
                    2 => 'Disabled',
                ),
            )
        );

        $this->addColumn(
            'action',
            array(
                'header' => Mage::helper('adminform')->__('Action'),
                'width' => '100',
                'type' => 'action',
                'getter' => 'getId',
                'actions' => array(
                    array(
                        'caption' => Mage::helper('adminform')->__('Edit'),
                        'url' => array('base'=> '*/*/edit'),
                        'field' => 'id'
                    )
                ),
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
                'is_system' => true,
            )
        );

        $this->addExportType(
            '*/*/exportCsv',
            Mage::helper('adminform')->__('CSV')
        );
        $this->addExportType(
            '*/*/exportXml',
            Mage::helper('adminform')->__('XML')
        );

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('adminform');

        $this->getMassactionBlock()->addItem(
            'delete',
            array(
                'label' => Mage::helper('adminform')->__('Delete'),
                'url' => $this->getUrl('*/*/massDelete'),
                'confirm' => Mage::helper('adminform')->__('Are you sure?')
            )
        );

        $statuses = Mage::getSingleton('adminform/status')->getOptionArray();

        array_unshift(
            $statuses,
            array(
                'label'=>'',
                'value'=>''
            )
        );

        $this->getMassactionBlock()->addItem(
            'status',
            array(
                'label'=> Mage::helper('adminform')->__('Change status'),
                'url' => $this->getUrl('*/*/massStatus', array('_current'=>true)),
                'additional' => array(
                    'visibility' => array(
                        'name' => 'status',
                        'type' => 'select',
                        'class' => 'required-entry',
                        'label' => Mage::helper('adminform')->__('Status'),
                        'values' => $statuses
                    )
                )
            )
        );

        return $this;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
