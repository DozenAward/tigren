<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Mageplaza\HelloWorld\Plugin;

use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\OrderManagementInterface;

/**
 * Class OrderManagement
 */
class OrderManagement
{
    /**
     * @param OrderManagementInterface $subject
     * @param OrderInterface $order
     *
     * @return OrderInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */


//    protected $action;
//
//
//    public function __construct(
//        \Magento\Catalog\Model\ResourceModel\Product\Action $action
//    {
//        $this->action = $action;
//
//    }

    public function afterPlace(
        OrderManagementInterface $subject,
        OrderInterface $result
    )
    {
        $orderId = $result->getIncrementId();
        if ($orderId) {
            //Your custom logic
            $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/Order_Info.log');
            $logger = new \Zend\Log\Logger();
            $logger->addWriter($writer);
            $logger->info(print_r($orderId, true));
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $orderData = $objectManager->create('Magento\Sales\Model\Order')->loadByIncrementId($orderId);
            $orderItems = $orderData->getAllVisibleItems();

//            $product = $this->productRepository->getById($productId);
//            $product->setData($attributeCode, $attributeValue);
//            $this->productRepository->save($product);
            foreach ($orderItems as $orderItems) {
                $temp = $orderItems->getData()['product_id'];
                $quantity = $orderItems->getData()['product_options']['info_buyRequest']['qty'];
//                $quantity = 5;
                $this->updateProductAttribute($temp, 'quantity_daily_deal', $quantity);
//                die($temp);
//                $this->updateProductAttribute($temp,'quantity_daily_deal',"19");
                $logger->info(print_r($orderItems->getData()['product_options']['info_buyRequest']['qty'], true));

            }
        }
        return $result;
    }


    public function updateProductAttribute($productId, $attributeCode, $value)
    {

//        $this->action->updateAttributes($productId, [$attributeCode => $value], '1');
//        $productRepository=$objectManager->get('\Magento\Catalog\Api\ProductRepositoryInterface');
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $productActionObject = $objectManager->create('Magento\Catalog\Model\Product\Action');

//        $temp = $productActionObject->getAttributes($productId,$attributeCode);
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $product = $objectManager->get('Magento\Catalog\Model\Product')->load($productId);
//        $quantity_daily_deal = $product->getData()['quantity_daily_deal'];
        $quantity_daily_deal = $product->getQuantityDailyDeal();
//        die("abczyz ".$quantity_daily_deal);
        if($quantity_daily_deal){
        $quantity_daily_deal = (($quantity_daily_deal - $value) > 0) ? ($quantity_daily_deal - $value) : 0;


        $productActionObject->updateAttributes([$productId], [$attributeCode => $quantity_daily_deal], 0);}

    }
}