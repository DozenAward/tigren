<?php
namespace Mageplaza\HelloWorld\Plugin\Model;

class Product
{
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {
//        $temp = $subject->getDailyDealTitle();
//       $result .= ' (Thưởng)'.$temp;
        return $result;
    }


//public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result){
//
//    $id_daily_deal = $subject->getIdDailyDeal();
//    $price =$subject->getPriceDailyDeal();
////            echo $price;
//    if($id_daily_deal){
//        $price =$subject->getPriceDailyDeal();
//        $temp=$this->collection;
//
//        $price_daily_deal =$price?$price:(100-$this->getDailyPrice($temp,$id_daily_deal))*$result/100;
//        //          echo $price_daily_deal;
//        return $price_daily_deal;
//    }
////
////            else return $result;
////            }
//    return $result;
//}

}