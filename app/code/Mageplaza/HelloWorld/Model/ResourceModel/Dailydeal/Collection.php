<?php
namespace Mageplaza\HelloWorld\Model\ResourceModel\Dailydeal;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id_daily_deal';
    protected $_eventPrefix = 'mageplaza_helloworld_dailydeal_collection';
    protected $_eventObject = 'dailydeal_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Mageplaza\HelloWorld\Model\Dailydeal', 'Mageplaza\HelloWorld\Model\ResourceModel\Dailydeal');
    }

}