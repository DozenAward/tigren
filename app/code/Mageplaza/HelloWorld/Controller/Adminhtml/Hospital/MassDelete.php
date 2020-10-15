<?php
namespace Mageplaza\Helloworld\Controller\Adminhtml\Hospital;

use Mageplaza\HelloWorld\Controller\Adminhtml\Hospital;


//use Mageplaza\Helloworld\Controller\Adminhtml\Hospital;
//use Magento\Backend\App\Action\Context;
//use Magento\Framework\Registry;
//use Magento\Framework\View\Result\PageFactory;
//use Mageplaza\HelloWorld\Model\HospitalFactory;
//use Mageplaza\HelloWorld\Model\ResourceModel\HospitalFactory as resPostsFactory;

class MassDelete extends Hospital
{
//    protected $_resPostsFactory;r
//
//    public function __construct(
//        Context $context,
//        Registry $coreRegistry,
//        PageFactory $resultPageFactory,
//        HospitalFactory $hospitalFactory,
//        resPostsFactory $resPostsFactory
//    )
//    {
//        parent::__construct($context);
//        $this->_resPostsFactory = $resPostsFactory;
//    }

    public function execute()
    {
        echo "thưởng";
        $hospitalIds = $this->getRequest()->getParam('ids',array());

        foreach ($hospitalIds as $hospitalId)
            echo $hospitalId;
//        $model = $this->_hospitalFactory->create();
//        $resModel = $this->_resPostsFactory->create();
        if(count($hospitalIds))
        {
            /** @var $postModel \Mageplaza\Hellworld\Model\Hospital */
            $hospitalModel = $this->_hospitalFactory->create();
//            $hospitalModel->load($hospitalId);
            $i = 0;
            foreach ($hospitalIds as $hospitalId) {
                try {
//                    $resModel->load($model,$hospitalId);
                    $hospitalModel->load($hospitalId);
//                    $resModel->delete($model);
                    $hospitalModel->delete();
                    $i++;

                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage($e->getMessage());
                }
            }
            if ($i > 0) {
                $this->messageManager->addSuccessMessage(
                    __('A total of %1 item(s) were deleted.', $i)
                );
            }
        }
        else
        {
            $this->messageManager->addErrorMessage(
                __('You can not delete item(s), Please check again %1')
            );
        }
        $this->_redirect('*/*/index');
    }
}