<?php
namespace Mageplaza\HelloWorld\Model\ResourceModel\Productdeal;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id_product_deal';
    protected $_eventPrefix = 'mageplaza_helloworld_productdeal_collection';
    protected $_eventObject = 'productdeal_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Mageplaza\HelloWorld\Model\Productdeal', 'Mageplaza\HelloWorld\Model\ResourceModel\Productdeal');
    }

}