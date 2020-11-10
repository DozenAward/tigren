<?php

namespace Mageplaza\HelloWorld\Controller\Adminhtml\Dailydeal;


use Mageplaza\HelloWorld\Controller\Adminhtml\Dailydeal;


/**
 * Class MassDelete
 */
class MassDailydeal extends Dailydeal
{



    public function execute()
    {
        $rateChangeStatus = 0;
        $list_id = $this->getRequest()->getParam('ids', array());
        $id_daily_deal = $this->getRequest()->getParam('id_daily_deal');
        $list_id_product = [];
        foreach($list_id as $key=>$value){
            $list_id_product[]=$value;
        }
        echo $list_id_product;
//        die($list_id);
//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $productActionObject = $objectManager->create('Magento\Catalog\Model\Product\Action');
//
////        $temp = $productActionObject->getAttributes($productId,$attributeCode);
//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
////    $product = $objectManager->get('Magento\Catalog\Model\Product')->load($productId);
//
//        $productActionObject->updateAttributes($list_id, ["id_daily_deal" => $id_daily_deal], 0);


//        foreach ($collection as $rate) {
//            $rate->setStatus($this->getRequest()->getParam('status'))->save();
//            $rateChangeStatus++;
//        }
//
//        if ($rateChangeStatus) {
//            $this->messageManager->addSuccess(__('A total of %1 record(s) were updated.', $rateChangeStatus));
//        }

//        $this->_redirect('catalog/product/index');
    }



}