<?php

namespace Mageplaza\HelloWorld\Ui;

use Magento\Ui\Component\MassAction;

class DailydealMassAction extends MassAction
{
    public function prepare()
    {
        parent::prepare();

        if ($this->isEnabled()) {
            $config = $this->getConfiguration();
            $config['actions'][] = [
                'component' => 'uiComponent',
                'type' => 'select',
                'label' => 'Dailydeal',
                'url' => '//google.com',
                'source' => 'Mageplaza\HelloWorld\Model\Config\Source\IdDailyDealOption'
            ];
            $this->setData('config', $config);
        }
    }

    public function isEnabled()
    {
        return true; // access your configuration here
    }
}