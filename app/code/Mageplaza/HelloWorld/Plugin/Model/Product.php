<?php
namespace Mageplaza\HelloWorld\Plugin\Model;

class Product
{
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {
       $result .= ' (Thưởng)';
        return $result;
    }

//    public function aroundSave(\Magento\Catalog\Model\Product $subject, \callable $proceed)
//    {
//        // before save
//        $result = $proceed();
//        // after save
//
//        return $result;
//    }
}