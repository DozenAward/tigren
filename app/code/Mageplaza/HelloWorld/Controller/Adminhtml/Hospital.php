<?php
namespace Mageplaza\HelloWorld\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\HelloWorld\Model\HospitalFactory;

class Hospital extends Action
{
    protected $_coreRegistry;
    protected $_resultPageFactory;
    protected $_hospitalFactory;

    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        HospitalFactory $hospitalFactory
    ) {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_hospitalFactory = $hospitalFactory;

    }
    public function execute()
    {

    }

    protected function _isAllowed()
    {
        return true;
    }
}