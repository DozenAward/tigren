<?php
namespace Mageplaza\HelloWorld\Model\ResourceModel\Hospital;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id_hospital';
    protected $_eventPrefix = 'mageplaza_helloworld_hospital_collection';
    protected $_eventObject = 'hospital_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Mageplaza\HelloWorld\Model\Hospital', 'Mageplaza\HelloWorld\Model\ResourceModel\Hospital');
    }

}