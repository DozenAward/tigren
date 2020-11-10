<?php
namespace Mageplaza\HelloWorld\Model;
class Productdeal extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'mageplaza_helloworld_produtdeal';

    protected $_cacheTag = 'mageplaza_helloworld_produtdeal';

    protected $_eventPrefix = 'mageplaza_helloworld_produtdeal';

    protected function _construct()
    {
        $this->_init('Mageplaza\HelloWorld\Model\ResourceModel\Productdeal');
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