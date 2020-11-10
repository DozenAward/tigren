<?php
namespace Mageplaza\HelloWorld\Controller\Adminhtml\Dailydeal;

use Mageplaza\HelloWorld\Controller\Adminhtml\Dailydeal;

class Delete extends Dailydeal
{
    public function execute()
    {
        $hospitalId = (int) $this->getRequest()->getParam('id');
//        echo $hospitalId;

        if ($hospitalId) {
            /** @var $postModel \Mageplaza\Hellworld\Model\Dailydeal */
            $hospitalModel = $this->_dailydealFactory->create();
            $hospitalModel->load($hospitalId);

            // Check this news exists or not
            if (!$hospitalModel->getIdDailyDeal()) {
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