<?php
namespace Mageplaza\HelloWorld\Block;

use Magento\Framework\App\Filesystem\DirectoryList;

class Product extends \Magento\Framework\View\Element\Template
{
    protected $_filesystem;
//    protected $_hospitalFactory;
    protected $col;
    protected $helperDataHospital;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\Collection $collection
//        Magento\Catalog\Model\Product\ProductFactory $hospitalFactory
//        \Mageplaza\HelloWorld\Model\HospitalFactory $hospitalFactory
//,
//        \Mageplaza\HelloWorld\Helper\DataHospital $helperDataHospital
    )
    {
        parent::__construct($context);
//        $this->_hospitalFactory = $hospitalFactory;
//        $this->helperDataHospital = $helperDataHospital;
        $this->col= $collection;
    }

    public function getResult()
    {
//        $hospital = $this->_hospitalFactory->create();
//        $collection = $hospital->getCollection();
        return $this->col;
    }

//    public function getEnable(){
//        return $this->helperDataHospital->getGeneralConfig('enable');
//    }
}


//namespace Mageplaza\HelloWorld\Block;
//class Product extends \Magento\Framework\View\Element\Template
//{
//    protected $_productCollectionFactory;
//
//    public function __construct(
//        \Magento\Backend\Block\Template\Context $context,
//        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
//        array $data = []
//    )
//    {
//        $this->_productCollectionFactory = $productCollectionFactory;
//        parent::__construct($context, $data);
//    }
//
//    public function getProductCollection()
//    {
//        $collection = $this->_productCollectionFactory->create();
//        $collection->addAttributeToSelect('*');
//        $collection->setPageSize(3); // fetching only 3 products
//        return $collection;
//    }
//}
