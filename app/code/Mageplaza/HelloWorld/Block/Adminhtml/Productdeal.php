<?php
namespace Mageplaza\HelloWorld\Block\Adminhtml;

class Productdeal extends \Magento\Backend\Block\Widget\Grid\Container
{

    protected function _construct()
    {
        $this->_controller = 'adminhtml_dailydeal';
        $this->_blockGroup = 'Mageplaza_HelloWorld';
        $this->_headerText = __('Product Deal');
        $this->_addButtonLabel = __('Create Product Deal');
        parent::_construct();
    }
}