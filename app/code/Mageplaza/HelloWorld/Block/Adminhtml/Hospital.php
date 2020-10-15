<?php
namespace Mageplaza\HelloWorld\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Hospital extends Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_hospital';
        $this->_blockGroup = 'Mageplaza_HelloWorld';
        $this->_headerText = __('Ahihi');
        $this->_addButtonLabel = __('Add New Hospital');
        parent::_construct();
    }
}