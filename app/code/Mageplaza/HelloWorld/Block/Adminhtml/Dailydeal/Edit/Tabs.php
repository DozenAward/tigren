<?php
namespace Mageplaza\HelloWorld\Block\Adminhtml\Dailydeal\Edit;

use Magento\Backend\Block\Widget\Tabs as WidgetTabs;

class Tabs extends WidgetTabs
{
    /**
     * Class constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('dailydeal_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Daily Deal Information'));
    }

    /**
     * @return $this
     */
    protected function _beforeToHtml()
    {
        $this->addTab(
            'hospital_info',
            [
                'label' => __('General'),
                'title' => __('General'),
                'content' => $this->getLayout()->createBlock(
                    'Mageplaza\HelloWorld\Block\Adminhtml\Dailydeal\Edit\Tab\Info'
                )->toHtml(),
                'active' => true
            ]
        );

        return parent::_beforeToHtml();
    }
}