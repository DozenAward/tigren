<?php
namespace Mageplaza\HelloWorld\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Mageplaza\HelloWorld\Model\DailydealFactory;

class Dailydeal extends Action
{
    protected $_coreRegistry;
    protected $_resultPageFactory;
    protected $_dailydealFactory;

    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        DailydealFactory $dailydealFactory
    ) {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_dailydealFactory = $dailydealFactory;

    }
    public function execute()
    {

    }

    protected function _isAllowed()
    {
        return true;
    }
}