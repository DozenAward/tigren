<?php


namespace Mageplaza\HelloWorld\Controller\Adminhtml\Hospital;

use Mageplaza\HelloWorld\Controller\Adminhtml\Hospital;
//use Mageplaza\HelloWorld\Model\Hospital as Hospital;

class NewAction extends Hospital
{
    /**
     * Edit A Contact Page
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
//        $this->_view->loadLayout();
//        $this->_view->renderLayout();
////        echo "t1";
//        $contactDatas = $this->getRequest()->getParam('id');
//        if (is_array($contactDatas)) {
//            $contact = $this->_objectManager->create(Hospital::class);
//            $contact->setData($contactDatas)->save();
//            $resultRedirect = $this->resultRedirectFactory->create();
//            return $resultRedirect->setPath('*/*/index');
//        }


        $this->_forward('edit');
    }
}