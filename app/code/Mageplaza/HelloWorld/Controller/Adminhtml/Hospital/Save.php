<?php
namespace Mageplaza\HelloWorld\Controller\Adminhtml\Hospital;

use Mageplaza\HelloWorld\Controller\Adminhtml\Hospital;

class Save extends Hospital
{
    /**
     * @return void
     */
    public function execute()
    {
        $isPost = $this->getRequest()->getPost();

        if ($isPost) {
            $hospitalModel = $this->_hospitalFactory->create();
            $hospitalId = $this->getRequest()->getParam('id');

            if ($hospitalId) {
                $hospitalModel->load($hospitalId);
            }
            $formData = $this->getRequest()->getParam('hospital');
            $hospitalModel->setData($formData);

            try {
                // Save news
                $hospitalModel->save();

                // Display success message
                $this->messageManager->addSuccess(__('The news has been saved.'));

                // Check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', ['id' => $hospitalModel->getId(), '_current' => true]);
                    return;
                }

                // Go to grid page
                $this->_redirect('*/*/');
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }

            $this->_getSession()->setFormData($formData);
            $this->_redirect('*/*/edit', ['id' => $hospitalId]);
        }
    }
}
