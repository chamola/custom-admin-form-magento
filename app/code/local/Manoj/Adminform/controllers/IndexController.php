<?php

class Manoj_Adminform_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        echo 'hi';
        $this->loadLayout();
        $this->renderLayout();
    }
}
