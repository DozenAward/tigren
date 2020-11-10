<?php
namespace Mageplaza\HelloWorld\Model\ResourceModel;


class Productdeal extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('product_daily_deal', 'id_product_deal');
    }

}