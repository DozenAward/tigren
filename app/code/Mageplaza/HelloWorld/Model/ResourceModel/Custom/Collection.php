<?php
namespace Mageplaza\HelloWorld\Model\ResourceModel\Custom ;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Mageplaza\HelloWorld\Model\Dailydeal', 'Magento\Catalog\Model\ResourceModel\Product');
    }


    protected function filterOrder($payment_method)
    {
        $this->sales_order_table = "main_table";
        $this->sales_order_payment_table = $this->getTable("sales_order_payment");
        $this->getSelect()
            ->join(array('payment' =>$this->sales_order_payment_table), $this->sales_order_table . '.entity_id= payment.parent_id',
                array('payment_method' => 'payment.method',
                    'order_id' => $this->sales_order_table.'.entity_id'
                )
            );
        $this->getSelect()->where("payment_method=".$payment_method);
    }
}