<?php
namespace Mageplaza\HelloWorld\Model;
class Dailydeal extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'mageplaza_helloworld_hospital';

    protected $_cacheTag = 'mageplaza_helloworld_hospital';

    protected $_eventPrefix = 'mageplaza_helloworld_hospital';

    protected function _construct()
    {
        $this->_init('Mageplaza\HelloWorld\Model\ResourceModel\Dailydeal');
    }

    public function getIdentities()
    {





        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}