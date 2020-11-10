<?php
namespace Mageplaza\HelloWorld\Block;

use Magento\Framework\App\Filesystem\DirectoryList;

class Dailydeal  extends \Magento\Framework\View\Element\Template
{
    protected $_filesystem;
    protected $_hospitalFactory;
//    protected $helperDataHospital;
    protected $subject;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Mageplaza\HelloWorld\Model\DailydealFactory $hospitalFactory,
//        \Mageplaza\HelloWorld\Helper\DataHospital $helperDataHospital,
        \Magento\Catalog\Api\Data\ProductInterface	$subject
    )
    {
        parent::__construct($context);
        $this->_hospitalFactory = $hospitalFactory;
//        $this->helperDataHospital = $helperDataHospital;
        $this->subject =$subject;
    }

    public function getResult()
    {
        $hospital = $this->_hospitalFactory->create();
        $collection = $hospital->getCollection();
        return $collection;
    }

    public function getEnable(){
        return $this->helperDataHospital->getGeneralConfig('enable');
    }

    function getSubject(){
        return $this->subject;
    }
}