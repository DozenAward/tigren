<?php
namespace Mageplaza\HelloWorld\Block\Adminhtml\Table\Edit\Tab;

class Main extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $store;

    /**
     * @var \Webspeaks\ProductsGrid\Helper\Data $helper
     */
    protected $helper;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Mageplaza\HelloWorld\Helper\DataTable $helper,
        array $data = []
    ) {
        $this->helper = $helper;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        /* @var $model \Webspeaks\ProductsGrid\Model\Contact */
        $model = $this->_coreRegistry->registry('ws_contact');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('contact_');

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Table Information')]);

        if ($model->getId()) {
            $fieldset->addField('id_daily_deal', 'hidden', ['name' => 'id_daily_deal']);
        }

        $fieldset->addField(
            'daily_deal_title',
            'text',
            [
                'name' => 'daily_deal_title',
                'label' => __('Daily Deal Title'),
                'title' => __('Daily Deal Title'),
                'required' => true,
            ]
        );

        $fieldset->addField(
            'price_for_deal',
            'text',
            [
                'name' => 'price_for_deal',
                'label' => __('Price For Deal'),
                'title' => __('Price For Deal'),
                'required' => true,
            ]
        );

        $fieldset->addField(
            'quantity_daily_deal',
            'text',
            [
                'name' => 'quantity_daily_deal',
                'label' => __('Quantity For Deal'),
                'title' => __('Quantity For Deal'),
                'required' => true,
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

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Main');
    }

    /**
     * Prepare title for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Main');
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

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}