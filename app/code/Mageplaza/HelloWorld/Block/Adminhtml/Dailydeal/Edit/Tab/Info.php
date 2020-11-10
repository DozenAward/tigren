<?php
namespace Mageplaza\HelloWorld\Block\Adminhtml\Dailydeal\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;
//use Mageplaza\Helloworld\Model\System\Config\Status;

class Info extends Generic implements TabInterface
{
    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    protected $_wysiwygConfig;


//    protected $_status;
    /**
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param Config $wysiwygConfig
    //     * @param Status $status
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Config $wysiwygConfig,
//        Status $status,
        array $data = []
    ) {
        $this->_wysiwygConfig = $wysiwygConfig;
//        $this->_status = $status;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form fields
     *
     * @return \Magento\Backend\Block\Widget\Form
     */
    protected function _prepareForm()
    {
        /** @var $model \Mageplaza\Helloworld\Model\DailydealFactory */
        $model = $this->_coreRegistry->registry('dailydeal_blog');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('dailydeal_');
        $form->setFieldNameSuffix('dailydeal');



//        $dateTimeFormatIso = Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        // new filed

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General')]
        );

        if ($model->getId()) {
            $fieldset->addField(
                'id_daily_deal',
                'hidden',
                ['name' => 'id_daily_deal']
            );
        }
        $fieldset->addField(
            'daily_deal_title',
            'text',
            [
                'name'      => 'daily_deal_title',
                'label'     => __('Daily Deal Title'),
                'title' => __('Daily Deal Title'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'price_for_deal',
            'text',
            [
                'name'      => 'price_for_deal',
                'label'     => __('Price For Deal($)'),
                'title' => __('Price For Deal($)'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'quantity_daily_deal',
            'text',
            [
                'name'      => 'quantity_daily_deal',
                'label'     => __('Quantity Discount'),
                'title' => __('Quantity Discount'),
                'required' => true
            ]
        );

        $fieldset->addField('date_start', 'date',[
            'label'    => __('Date Start Sale'),
            'title'    => __('Date Start Sale'),
            'time'      => true,
            'name'     => 'date_start',
//            'image'    => $this->getSkinUrl('images/grid-cal.gif'),
            'date_format' => $this->_localeDate->getDateFormat(\IntlDateFormatter::MEDIUM),
            'time_format' => $this->_localeDate->getTimeFormat(\IntlDateFormatter::SHORT),
            'required' => true,
        ]);



        $fieldset->addField('date_end', 'date', [
            'label'    => __('Date End Sale'),
            'title'    => __('Date End Sale'),
            'time'      => true,
            'name'     => 'date_end',
//            'image'    => $this->getSkinUrl('images/grid-cal.gif'),
            'date_format' => $this->_localeDate->getDateFormat(\IntlDateFormatter::MEDIUM),
            'time_format' => $this->_localeDate->getTimeFormat(\IntlDateFormatter::SHORT),
            'required' => true,
        ]);

        $fieldset->addField(
            'daily_deal_enable',
            'select',
            [
                'name'      => 'daily_deal_enable',
                'label'     => __('Daily Deal Status'),
                'title' => __('Daily Deal Status'),
                'required' => true,
                'options'    => [
                    '1' => __('Enable'),
                    '0' => __('Disable'),
                ],
            ]
        );
//
        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);

        return parent::_prepareForm();
    }
    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Hospital Info');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Hospital Info');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }
}