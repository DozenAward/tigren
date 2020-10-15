<?php
namespace Mageplaza\HelloWorld\Block;

use Magento\Framework\App\Filesystem\DirectoryList;

class Hospital extends \Magento\Framework\View\Element\Template
{
    protected $_filesystem;
    protected $_hospitalFactory;
    protected $helperDataHospital;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Mageplaza\HelloWorld\Model\HospitalFactory $hospitalFactory,
        \Mageplaza\HelloWorld\Helper\DataHospital $helperDataHospital
    )
    {
        parent::__construct($context);
        $this->_hospitalFactory = $hospitalFactory;
        $this->helperDataHospital = $helperDataHospital;
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
}