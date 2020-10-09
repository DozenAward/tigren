<?php
namespace Mageplaza\HelloWorld\Setup;


//use Magento\Framework\Setup;
//use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
//    private $eavSetupFactory;
////    protected $logger;
////
//    public function __construct(EavSetupFactory $eavSetupFactory) {
//        $this->eavSetupFactory = $eavSetupFactory;
////        $this->logger = $logger;
//    }

	public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
		$installer = $setup;

		$installer->startSetup();

//		if(version_compare($context->getVersion(), '1.1.0', '<')) {
//			if (!$installer->tableExists('mageplaza_helloworld_post')) {
//				$table = $installer->getConnection()->newTable(
//					$installer->getTable('mageplaza_helloworld_post')
//				)
//					->addColumn(
//						'post_id',
//						\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
//						null,
//						[
//							'identity' => true,
//							'nullable' => false,
//							'primary'  => true,
//							'unsigned' => true,
//						],
//						'Post ID'
//					)
//					->addColumn(
//						'name',
//						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//						255,
//						['nullable => false'],
//						'Post Name'
//					)
//					->addColumn(
//						'url_key',
//						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//						255,
//						[],
//						'Post URL Key'
//					)
//					->addColumn(
//						'post_content',
//						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//						'64k',
//						[],
//						'Post Post Content'
//					)
//					->addColumn(
//						'tags',
//						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//						255,
//						[],
//						'Post Tags'
//					)
//					->addColumn(
//						'status',
//						\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
//						1,
//						[],
//						'Post Status'
//					)
//					->addColumn(
//						'featured_image',
//						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//						255,
//						[],
//						'Post Featured Image'
//					)
//					->addColumn(
//						'created_at',
//						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
//						null,
//						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
//						'Created At'
//					)->addColumn(
//						'updated_at',
//						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
//						null,
//						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
//						'Updated At')
//					->setComment('Post Table');
//				$installer->getConnection()->createTable($table);
//
//				$installer->getConnection()->addIndex(
//					$installer->getTable('mageplaza_helloworld_post'),
//					$setup->getIdxName(
//						$installer->getTable('mageplaza_helloworld_post'),
//						['name','url_key','post_content','tags','featured_image'],
//						\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
//					),
//					['name','url_key','post_content','tags','featured_image'],
//					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
//				);
//			}
//		}

//        if (version_compare($context->getVersion(), '1.1.2', '<')) {
//            $installer->getConnection()->addColumn(
//                $installer->getTable('catalog_product_entity'),
//                'new_item',
//                [
//                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
//                    'length' => 1,
//                    'nullable' => true,
//                    'comment' => 'new product'
//                ]
//            );
//        }


//        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
//        $eavSetup->addAttribute(
//            \Magento\Catalog\Model\Product::ENTITY,
//            'is_new_item',[
//              'type' => 'text',
//                'backend' => '',
//                'frontend' => '',
//                'label' => 'Is New Item',
//                'input' => 'select',
//                'class' => '',
//                'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
//                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
//                'visible' => true,
//                'required' => true,
//                'user_defined' => false,
//                'default' => '',
//                'searchable' => false,
//                'filterable' => false,
//                'comparable' => false,
//                'visible_on_front' => false,
//                'used_in_product_listing' => true,
//                'unique' => false,
//                'apply_to' => ''
//            ]
//        );

        $installer->endSetup();
	}
}
