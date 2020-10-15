<?php
namespace Mageplaza\HelloWorld\Controller\Adminhtml\Hospital;

use Mageplaza\HelloWorld\Controller\Adminhtml\Hospital;

class Edit extends Hospital
{
    /**
     * @return void
     */
    public function execute()
    {
//        echo "thưởng";
        $hospitalId = $this->getRequest()->getParam('id');
//    echo $hospitalId;
        $model = $this->_hospitalFactory->create();

        if ($hospitalId) {
            $model->load($hospitalId);
            if (!$model->getIdHospital()) {
                $this->messageManager->addError(__('This news no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        // Restore previously entered form data from session
        $data = $this->_session->getNewsData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('hospital_blog', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Mageplaza_HelloWorld::helloworld_menu');
//        $resultPage->getConfig()->getTitle()->prepend(__('Hospital'));

        return $resultPage;
    }
}