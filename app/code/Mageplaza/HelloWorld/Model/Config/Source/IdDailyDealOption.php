<?php
namespace Mageplaza\HelloWorld\Model\Config\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class IdDailyDealOption extends AbstractSource
{
    /**
     * Get all options
     *
     * @return array
     */

    protected $hospitalFactory;

    public function __construct(

        \Mageplaza\HelloWorld\Model\DailydealFactory $hospitalFactory
    ) {
        $this->hospitalFactory=$hospitalFactory;
    }

    public function getAllOptions()
    {
        if (null === $this->_options) {
            $this->_options[]=['label' => __('None Daily Deal Apply'),
                'value' => ''];
            $temp = $this->hospitalFactory->create();
            $collection = $temp->getCollection();
            foreach($collection as $item){
                $label = $item->getData()['daily_deal_title'];
                $value = $item->getData()['id_daily_deal'];
                $qtity = $item->getData()['quantity_daily_deal'];
                $status = $item->getData()['daily_deal_enable'];
                $status = $status ? "Enable" : "Disable";
                $this->_options[]=['label' => __($label."_  ID : ".$value."  _ Qty : ".$qtity." _  Status: ".$status),
                'value' => $value,];
            }
        }
        return $this->_options;
    }
}