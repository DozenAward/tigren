<?php
namespace Mageplaza\HelloWorld\Block\Adminhtml\Catalog\Product\Edit\Tab;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;

class DailyDeal extends \Magento\Framework\View\Element\Template
{
    /**
     * @var string
     */
    protected $_template = 'product/edit/dailydeal.phtml';

    /**
     * Core registry
     *
     * @var Registry
     */
    protected $_coreRegistry = null;

    public function __construct(
        Context $context,
        Registry $registry,
        array $data = []
    )
    {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve product
     *
     * @return \Magento\Catalog\Model\Product
     */
    public function getProduct()
    {
        return $this->_coreRegistry->registry('current_product');
    }

    function _prepareForm(){
        $fieldset->addField('date', 'date', array(
            'name'               => 'date',
            'label'              => Mage::helper('your_module_name')->__('Date'),
//            'after_element_html' => '<small>Comments</small>',
            'tabindex'           => 1,
//            'image'              => $this->getSkinUrl('images/grid-cal.gif'),
            'format'             => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT) ,
            'value'              => date( Mage::app()->getLocale()->getDateStrFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
                strtotime('next weekday') )
        ));

    }


}