<?php
namespace Mageplaza\HelloWorld\Controller\Adminhtml\Hospital;

use Mageplaza\HelloWorld\Controller\Adminhtml\Hospital;

class Delete extends Hospital
{
    public function execute()
    {
        $hospitalId = (int) $this->getRequest()->getParam('id');
//        echo $hospitalId;

        if ($hospitalId) {
            /** @var $postModel \Mageplaza\Hellworld\Model\Hospital */
            $hospitalModel = $this->_hospitalFactory->create();
            $hospitalModel->load($hospitalId);

            // Check this news exists or not
            if (!$hospitalModel->getIdHospital()) {
                $this->messageManager->addError(__('This news no longer exists.'));
            } else {
                try {
                    // Delete news
                    $hospitalModel->delete();
                    $this->messageManager->addSuccess(__('The news has been deleted.'));

                    // Redirect to grid page
                    $this->_redirect('*/*/');
                    return;
                } catch (\Exception $e) {
                    $this->messageManager->addError($e->getMessage());
                    $this->_redirect('*/*/edit', ['id' => $hospitalModel->getIdHospital()]);
                }
            }
        }
    }
}