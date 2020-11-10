<?php
namespace Mageplaza\HelloWorld\Block;

use Magento\Framework\App\Filesystem\DirectoryList;

class TimeCountDown extends \Magento\Framework\View\Element\Template
{
    protected $_filesystem;
    protected $_hospitalFactory;
    protected $productlist;
    protected $_registry;
//    protected $helperDataHospital;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Mageplaza\HelloWorld\Model\DailydealFactory $hospitalFactory
//        \Mageplaza\HelloWorld\Plugin\ProductList $productlist
    )
    {
        parent::__construct($context);
        $this->_hospitalFactory = $hospitalFactory;
        $this->_registry = $registry;
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

    public function getEnable(){
//        return $this->helperDataHospital->getGeneralConfig('enable');
        return 1;
    }

    public function execute(){
//        echo "Thưởng à ";
    }

    public function getProductData(){
        return $this->getProduct();
    }

    public function getCurrentProduct()
    {
        return $this->_registry->registry('current_product');
    }
}