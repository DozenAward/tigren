<?php
namespace Mageplaza\HelloWorld\Controller\Index;

class Hospital extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $helperDataHospital;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Mageplaza\HelloWorld\Helper\DataHospital $helperDataHospital
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->helperDataHospital = $helperDataHospital;
        return parent::__construct($context);
    }

    public function execute()
    {
//        echo "Module Created Successfully";
//        echo $this->helperDataHospital->getGeneralConfig('enable');
//        echo $this->helperDataHospital->getGeneralConfig('display_text');
        return $this->_pageFactory->create();
    }
}