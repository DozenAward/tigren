<?php

namespace Mageplaza\HelloWorld\Model;

class Product extends \Magento\Catalog\Model\Product
{
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
}