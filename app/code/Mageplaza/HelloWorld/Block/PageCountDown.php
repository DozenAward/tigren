<?php
namespace Mageplaza\HelloWorld\Block;

use Magento\Framework\App\Filesystem\DirectoryList;

class PageCountDown extends \Magento\Framework\View\Element\Template
{
    protected $_filesystem;
    protected $_hospitalFactory;
    protected $_registry;
//    protected $productlist;
//    protected $helperDataHospital;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Mageplaza\HelloWorld\Model\DailydealFactory $hospitalFactory
//        \Mageplaza\HelloWorld\Plugin\ProductList $productlist
    )
    {
        parent::__construct($context);
        $this->_registry = $registry;
        $this->_hospitalFactory = $hospitalFactory;
//        $this->productlist = $productlist;
    }

    public function getResult($id_daily_deal)
    {
//        $productlist = $this->productlist;
//        print_r($productlist->getData());
        $hospital = $this->_hospitalFactory->create();
        $collection = $hospital->getCollection()->addFieldToFilter('id_daily_deal',$id_daily_deal);
        return $collection;
    }

//    public function getCurrentQtyDailyDeal(){
//        return $this->_registry->registry('current_quantity_daily_deal');
//    }

//    public function getCurrentIdDailydeal(){
//       return $this->_registry->registry('current_id_daily_deal');
//    }

    public function getCurrentCategory()
    {
        return $this->_registry->registry('current_category');
    }

    public function getCurrentProduct()
    {
        return $this->_registry->registry('current_product');
    }
}