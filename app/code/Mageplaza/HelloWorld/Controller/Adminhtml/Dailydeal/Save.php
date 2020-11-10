<?php
namespace Mageplaza\HelloWorld\Controller\Adminhtml\Dailydeal;

use Mageplaza\HelloWorld\Controller\Adminhtml\Dailydeal;

class Save extends Dailydeal
{
    /**
     * @return void
     */
    public function execute()
    {
        $isPost = $this->getRequest()->getPost();

        if ($isPost) {
            $dailydealModel = $this->_dailydealFactory->create();
            $dailydealId = $this->getRequest()->getParam('id');
            echo "thưởng";
            echo ($dailydealId);


            if ($dailydealId) {
                $dailydealModel->load($dailydealId);
            }
            $formData = $this->getRequest()->getParam('dailydeal');
            $dailydealModel->setData($formData);
//            print_r($formData);
//            die ("1");

            try {
                // Save news
                $dailydealModel->save();

                // Display success message
                $this->messageManager->addSuccess(__('The news has been saved.'));

                // Check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', ['id' => $dailydealModel->getId(), '_current' => true]);
                    return;
                }

                // Go to grid page
                $this->_redirect('*/*/');
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }

            $this->_getSession()->setFormData($formData);
            $this->_redirect('*/*/edit', ['id' => $dailydealId]);
        }
    }
}
