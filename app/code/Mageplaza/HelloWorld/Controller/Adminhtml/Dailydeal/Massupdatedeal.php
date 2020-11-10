<?php

namespace Mageplaza\HelloWorld\Controller\Adminhtml\Dailydeal;

class Massupdatedeal extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;
    protected $hospitalFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Mageplaza\HelloWorld\Model\DailydealFactory $hospitalFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory

    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->hospitalFactory=$hospitalFactory;
    }

    public function execute()
    {

        $list_id = $this->getRequest()->getParam('selected');
        $id_daily_deal = $this->getRequest()->getParam('id_daily_deal');
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $productActionObject = $objectManager->create('Magento\Catalog\Model\Product\Action');
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();


//        Get collection Dailydeal
        $temp= $this->hospitalFactory->create();
        $collection =$temp->getCollection();
        $deal_detail = $collection->addFieldtoFilter('id_daily_deal', $id_daily_deal);
        $price_daily_deal = $deal_detail->getFirstItem()['price_for_deal'];
        $quantity_daily_deal = $deal_detail->getFirstItem()['quantity_daily_deal'];

        $productActionObject->updateAttributes($list_id, ["id_daily_deal" => $id_daily_deal], 0);
        $productActionObject->updateAttributes($list_id, ["price_daily_deal" => $price_daily_deal], 0);
        $productActionObject->updateAttributes($list_id, ["quantity_daily_deal" => $quantity_daily_deal], 0);

        $this->messageManager->addSuccess(__('A total of %1 record(s) were updated.', count($list_id)));
        $this->_redirect('catalog/product/index');
    }


}