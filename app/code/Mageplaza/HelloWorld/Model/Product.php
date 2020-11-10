<?php

namespace Mageplaza\HelloWorld\Model;

class Product extends \Magento\Catalog\Model\Product
{
//    protected   $collection;
//    public	function	__construct(
//
//        \Mageplaza\HelloWorld\Model\ResourceModel\Dailydeal\Collection $collection
//    )
//    {
//
//        $this->collection =$collection;
//    }
//    public function getName()
//    {
//        $changeNamebyPreference = $this->_getData('name') . ' modified by Preference Sample 2';
//        return $changeNamebyPreference;
//    }
public function getNewItem(){
    return $this->_getData(self::NEW_ITEM);
}


public function setNewItem($newItem)
            {
                return $this->setData(self::NEW_ITEM, $newItem);
            }


public function getIdDailyDeal(){
    return $this->_getData(self::ID_DAILY_DEAL);
}


public function setIdDailyDeal($newItem)
{
    return $this->setData(self::ID_DAILY_DEAL, $newItem);
}

//public function getDailyDealTitle(){
//    $temp= $this->collection();
//    $id_daily_deal = $this->getIdDailyDeal();
//    $deal_detail = $temp->addFieldtoFilter('id_daily_deal', $id_daily_deal);
//    $deal_detail->get->getFirstItem()['daily_deal_title'];
//}
}