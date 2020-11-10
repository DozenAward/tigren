<?php

namespace Mageplaza\HelloWorld\Plugin;


class NewProductFlag
{
    protected $request;
    protected $localeDate;
    protected $hospitalFactory;
    protected $_checkoutSession;

    public function __construct(
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $localeDate,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Mageplaza\HelloWorld\Model\DailydealFactory $hospitalFactory
    )
    {
        $this->request = $request;
        $this->localeDate = $localeDate;
        $this->hospitalFactory = $hospitalFactory;
        $this->_checkoutSession= $checkoutSession;
    }


//    public function aroundGetName(\Magento\Catalog\Api\Data\ProductInterface	$subject,	$result){
//        $id_daily_deal = $subject->getIdDailyDeal();
//        $temp=$this->hospitalFactory->create();
//        $collection = $temp->getCollection();
////        echo $id_daily_deal."shihi";
//        if($subject->getIdDailyDeal()) {
//            $daily_deal_infor = $collection->addFilter('id_daily_deal', $id_daily_deal);
//            $daiyly_deal_enable = $daily_deal_infor->getFirstItem()['daiyly_deal_enable'];
//            if ($daiyly_deal_enable) {
//                return $this->layout->createBlock('Mageplaza\HelloWorld\Block\TimeCountDown')->setIdDailyDeal($subject->getIdDailyDeal())->setTemplate('Mageplaza_HelloWorld::timecountdown.phtml')->toHtml();
//            }
//        }
//    }


    public function afterGetName(\Magento\Catalog\Api\Data\ProductInterface $subject, $result)
    {
        $pages = ['catalog_product_view', 'catalog_category_view'];
        if (in_array($this->request->getFullActionName(), $pages)) {
//    $timezone	=	new	\DateTimeZone($this->localeDate->getConfigTimezone());
//    $now	=	new	\DateTime('now',	$timezone);
//        $ourCustomData = $this->customDataRepository->get($subject->getId());
//        $extensionAttributes = $subject->getExtensionAttributes();
//        $extensionAttributes->setOurCustomData($ourCustomData);
//        $subject->setExtensionAttributes($extensionAttributes);

            $id_daily_deal = $subject->getIdDailyDeal();

            $temp = $this->hospitalFactory->create();
            $collection = $temp->getCollection();
//    echo $id_daily_deal;
            $price_daily_deal = $subject->getDailyDealTitle();
            $price_daily_deal = $this->getDailyData($collection, $id_daily_deal);


//            $order    = $this->_checkoutSession->getLastRealOrder();
//            print_r($order->getData());
//            echo "thưởng";
//            $order      = \Magento\Checkout\Model\Session::getModel('sales/order')->load($orderId, 'increment_id');
//            $ordered_items = $orderId->getAllItems();
//            foreach ($order as $item) {
//                print_r ($item->getData());
//            }

//            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//            $product = $objectManager->get('Magento\Catalog\Model\Product')->load('2048');
//            print_r($product->getData()['quantity_daily_deal']);

            if ($id_daily_deal) {
                return $result;
            } else {
                return $result;
            }
        }
        return $result;
    }

    function getDailyData($temp, $id_daily_deal)
    {
//

        $deal_detail = $temp->addFieldtoFilter('id_daily_deal', $id_daily_deal);
        return $deal_detail->getFirstItem()['daily_deal_title'];
    }

    function getDailyPrice($temp, $id_daily_deal)
    {
//

        $deal_detail = $temp->addFieldtoFilter('id_daily_deal', $id_daily_deal);

        $percent = $deal_detail->getFirstItem()['percent'];
//
        return $percent;

    }


    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        $id_daily_deal = $subject->getIdDailyDeal();
        $price = $subject->getPriceDailyDeal();

        $temp = $this->hospitalFactory->create();
        $collection = $temp->getCollection();
        $deal_detail = $collection->addFieldtoFilter('id_daily_deal', $id_daily_deal);
        $daily_deal_enable = $deal_detail->getFirstItem()['daily_deal_enable'];
        $date_start = $deal_detail->getFirstItem()['date_start'];
        $date_end =$deal_detail->getFirstItem()['date_end'];
        $now = date("Y-m-d h:m:s");
//    echo $now;
        $time_condition =((strtotime($now)<strtotime($date_end)))&&((strtotime($now)>strtotime($date_start))&&$daily_deal_enable);
        if ($id_daily_deal && $time_condition) {
            return $price ? $price : $result;
        }

        return $result;
    }
}