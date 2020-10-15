<?php
namespace Mageplaza\HelloWorld\Controller\Adminhtml\Hospital;

use Mageplaza\HelloWorld\Controller\Adminhtml\Hospital;

class Grid extends Hospital
{
    public function execute()
    {
        return $this->_resultPageFactory->create();
    }
}