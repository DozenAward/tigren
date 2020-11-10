<?php

namespace Mageplaza\HelloWorld\Ui\Component\MassAction\Dailydeal;

use Magento\Framework\UrlInterface;
use Zend\Stdlib\JsonSerializable;

/**
 * Class Options
 */
class Options implements JsonSerializable
{
    /**
     * @var array
     */
    protected $options;

    /**
     * Additional options params
     *
     * @var array
     */
    protected $data;

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * Base URL for subactions
     *
     * @var string
     */
    protected $urlPath;

    /**
     * Param name for subactions
     *
     * @var string
     */
    protected $paramName;

    /**
     * Additional params for subactions
     *
     * @var array
     */
    protected $additionalData = [];


    protected $hospitalFactory;

    /**
     * Constructor
     *
     * @param CollectionFactory $collectionFactory
     * @param UrlInterface $urlBuilder
     * @param array $data
     */
    public function __construct(
        UrlInterface $urlBuilder,
        \Mageplaza\HelloWorld\Model\DailydealFactory $hospitalFactory,
        array $data = []
    )
    {
        $this->data = $data;
        $this->urlBuilder = $urlBuilder;
        $this->hospitalFactory=$hospitalFactory;
    }

    /**
     * Get action options
     *
     * @return array
     */
    public function jsonSerialize()
    {
        if ($this->options === null) {
            $options[]=
                array(
                    'label' => __('None Daily Deal Apply'),
                    'value' => ''
                );

            $temp = $this->hospitalFactory->create();
            $collection = $temp->getCollection();
            foreach($collection as $item){
                $label = $item->getData()['daily_deal_title'];
                $value = $item->getData()['id_daily_deal'];
                $qtity = $item->getData()['quantity_daily_deal'];
                $status = $item->getData()['daily_deal_enable'];
                $status = $status ? "Enable" : "Disable";
                $options[]=['label' => __($label."_  ID : ".$value),
                    'value' => $value,];
            }
            $this->prepareData();
            foreach ($options as $optionCode) {
                $this->options[$optionCode['value']] = [
                    'type' => 'id_daiy_deal_' . $optionCode['value'],
                    'label' => $optionCode['label'],
                ];

                if ($this->urlPath && $this->paramName) {
                    $this->options[$optionCode['value']]['url'] = $this->urlBuilder->getUrl(
                        $this->urlPath,
                        [$this->paramName => $optionCode['value']]
                    );
                }

                $this->options[$optionCode['value']] = array_merge_recursive(
                    $this->options[$optionCode['value']],
                    $this->additionalData
                );
            }
            $this->options = array_values($this->options);
        }
        return $this->options;
    }

    /**
     * Prepare addition data for subactions
     *
     * @return void
     */
    protected function prepareData()
    {
        foreach ($this->data as $key => $value) {
            switch ($key) {
                case 'urlPath':
                    $this->urlPath = $value;
                    break;
                case 'paramName':
                    $this->paramName = $value;
                    break;
                default:
                    $this->additionalData[$key] = $value;
                    break;
            }
        }
    }
}