<?php
namespace Mageplaza\HelloWorld\Block\Adminhtml\Hospital\Edit\Tab;

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
        /** @var $model \Mageplaza\Helloworld\Model\HospitalFactory */
        $model = $this->_coreRegistry->registry('hospital_blog');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('hospital_');
        $form->setFieldNameSuffix('hospital');
        // new filed

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General')]
        );

        if ($model->getId()) {
            $fieldset->addField(
                'id_hospital',
                'hidden',
                ['name' => 'id_hospital']
            );
        }
        $fieldset->addField(
            'title',
            'text',
            [
                'name'      => 'title',
                'label'     => __('Title'),
                'title' => __('Title'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'address',
            'text',
            [
                'name'      => 'address',
                'label'     => __('Address'),
                'title' => __('Address'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'telephone',
            'text',
            [
                'name'      => 'telephone',
                'label'     => __('Telephone'),
                'title' => __('Telephone'),
                'required' => true
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