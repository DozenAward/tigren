<?php


namespace Mageplaza\HelloWorld\Controller\Adminhtml\Dailydeal;

use Mageplaza\HelloWorld\Controller\Adminhtml\Dailydeal;
//use Mageplaza\HelloWorld\Model\Hospital as Hospital;

class NewAction extends Dailydeal
{
    /**
     * Edit A Contact Page
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {



        $this->_forward('edit');
    }
}