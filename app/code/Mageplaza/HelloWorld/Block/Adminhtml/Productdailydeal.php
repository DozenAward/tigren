<?php
namespace Mageplaza\HelloWorld\Block\Adminhtml;

class Productdailydeal extends \Magento\Backend\Block\Widget\Grid\Container
{

    protected function _construct()
    {
        $this->_controller = 'adminhtml_dailydeal';
        $this->_blockGroup = 'Mageplaza_HelloWorld';
        $this->_headerText = __('DailyDealTable');
//        $this->_addButtonLabel = __('Create New Deal Contruct');
        parent::_construct();
    }
}