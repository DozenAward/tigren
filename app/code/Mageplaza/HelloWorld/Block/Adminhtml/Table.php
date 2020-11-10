<?php
namespace Mageplaza\HelloWorld\Block\Adminhtml;

class Table extends \Magento\Backend\Block\Widget\Grid\Container
{

    protected function _construct()
    {
        $this->_controller = 'adminhtml_table';
        $this->_blockGroup = 'Mageplaza_HelloWorld';
        $this->_headerText = __('Table Deal');
        $this->_addButtonLabel = __('Create New Product Deal');
        parent::_construct();
    }
}