<?php

namespace Mageplaza\HelloWorld\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;

class CustomPriceInCart implements ObserverInterface
{


    protected $hospitalFactory;

    public function __construct(

        \Mageplaza\HelloWorld\Model\DailydealFactory $hospitalFactory
    )
    {
        $this->hospitalFactory = $hospitalFactory;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $item = $observer->getEvent()->getData('quote_item');
        $item = ($item->getParentItem() ? $item->getParentItem() : $item);


        // here your custom price goes
        //    print_r($item);
//    $customPrice = $observer->getProduct()->getPriceDailyDeal();
        $customPrice = $item->getProduct()->getPriceDailyDeal();
        $id_daily_deal = $observer->getProduct()->getIdDailyDeal();
        $quantity_daily_deal = $observer->getProduct()->getQuantityDailyDeal();

//    $deal_detail = $temp->addFieldtoFilter('id_daily_deal', $id_daily_deal);
        if ($id_daily_deal) {
//            $temp = $this->hospitalFactory->create();
//            $collection = $temp->getCollection();
//            $daily_deal_enable =$collection->getFirstItem()['daily_deal_enable'];
            $condition = $this->isDailyDeal($id_daily_deal);
            //echo "123";
            if ($condition && ($quantity_daily_deal > 0)) {
                $item->setCustomPrice($customPrice);
                $item->setOriginalCustomPrice($customPrice);
                $item->getProduct()->setIsSuperMode(true);
            }
        }


    }

    public function isDailyDeal($id_daily_deal)
    {
        $temp = $this->hospitalFactory->create();
        $collection = $temp->getCollection();
        $deal_detail = $collection->addFieldtoFilter('id_daily_deal', $id_daily_deal);
        $daily_deal_enable = $deal_detail->getFirstItem()['daily_deal_enable'];
        $date_start = $deal_detail->getFirstItem()['date_start'];
        $date_end = $deal_detail->getFirstItem()['date_end'];
        $now = date("Y-m-d h:m:s");
//    echo $now;
        $condition = ((strtotime($now) < strtotime($date_end))) && ((strtotime($now) > strtotime($date_start)) && $daily_deal_enable);
        return $condition;
    }
}