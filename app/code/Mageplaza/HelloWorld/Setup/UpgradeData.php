<?php
namespace Mageplaza\HelloWorld\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

class UpgradeData implements UpgradeDataInterface {
    private $eavSetupFactory;

    /**
     * Init
     *
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
        $setup->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        if(version_compare($context->getVersion(), '1.2.5', '<'))
        {
//            $eavSetup->addAttribute(
//                \Magento\Catalog\Model\Product::ENTITY, 'is_new_item', [
//                    'group' => 'General',
//                    'type' => 'int',
//                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
//                    'frontend' => '',
//                    'label' => 'Is New Item',
//                    'input' => 'boolean',
//                    'class' => '',
//                    'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
//                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
//                    'visible' => true,
//                    'required' => false,
//                    'user_defined' => false,
//                    'default' => '1',
//                    'searchable' => false,
//                    'filterable' => false,
//                    'comparable' => false,
//                    'visible_on_front' => false,
//                    'used_in_product_listing' => false,
//                    'unique' => false,
//                    'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
//                ]
//            );

            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY, 'id_daily_deal', [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'frontend' => '',
                    'label' => 'ID Daily Deal',
                    'input' => 'text',
                    'class' => '',
                    'source' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '0',
                    'searchable' => false,
                    'filterable' => true,
                    'comparable' => false,
                    'visible_on_front' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
                ]
            );

            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY, 'price_daily_deal', [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'frontend' => '',
                    'label' => 'Price Daily Deal',
                    'input' => 'text',
                    'class' => '',
                    'source' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '',
                    'searchable' => false,
                    'filterable' => true,
                    'comparable' => false,
                    'visible_on_front' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
                ]
            );

            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY, 'quantity_daily_deal', [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'frontend' => '',
                    'label' => 'Quantity Daily Deal',
                    'input' => 'text',
                    'class' => '',
                    'source' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '0',
                    'searchable' => false,
                    'filterable' => true,
                    'comparable' => false,
                    'visible_on_front' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
                ]
            );
//            $eavSetup->removeAttribute(
//                \Magento\Catalog\Model\Product::ENTITY,
//                'id_daily_deal');
//            $eavSetup->removeAttribute(
//                \Magento\Catalog\Model\Product::ENTITY,
//                'price_daily_deal');
//            $eavSetup->removeAttribute(
//                \Magento\Catalog\Model\Product::ENTITY,
//                'quantity_daily_deal');

        }

        if(version_compare($context->getVersion(), '1.3.2', '<'))
        {

//            $eavSetup->removeAttribute(
//                \Magento\Catalog\Model\Product::ENTITY,
//                'test_product_attribute');
//            $eavSetup->removeAttribute(
//                \Magento\Catalog\Model\Product::ENTITY,
//                'id_daily_deal');
//            $eavSetup->removeAttribute(
//                \Magento\Catalog\Model\Product::ENTITY,
//                'price_daily_deal');
//            $eavSetup->removeAttribute(
//                \Magento\Catalog\Model\Product::ENTITY,
//                'quantity_daily_deal');

            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'id_daily_deal',
                [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'frontend' => '',
                    'label' => 'Id Daily Deal',
                    'input' => 'select',
                    'class' => '',
                    'source' => 'Mageplaza\HelloWorld\Model\Config\Source\IdDailyDealOption',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '',
                    'searchable' => false,
                    'filterable' => true,
                    'comparable' => false,
                    'visible_on_front' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
                ]
            );

            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY, 'price_daily_deal', [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'frontend' => '',
                    'label' => 'Price Daily Deal($)',
                    'input' => 'text',
                    'class' => '',
                    'source' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '',
                    'searchable' => false,
                    'filterable' => true,
                    'comparable' => false,
                    'visible_on_front' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
                ]
            );

            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY, 'quantity_daily_deal', [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                    'frontend' => '',
                    'label' => 'Quantity Daily Deal',
                    'input' => 'text',
                    'class' => '',
                    'source' => '',
                    'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '0',
                    'searchable' => false,
                    'filterable' => true,
                    'comparable' => false,
                    'visible_on_front' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
                ]
            );
//            $eavSetup->removeAttribute(
//                \Magento\Catalog\Model\Product::ENTITY,
//                'test_product_attribute');
        }

        $setup->endSetup();
    }
}
?>