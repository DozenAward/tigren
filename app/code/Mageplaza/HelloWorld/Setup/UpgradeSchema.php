<?php
namespace Mageplaza\HelloWorld\Setup;


//use Magento\Framework\Setup;
//use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{


	public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
		$installer = $setup;

		$installer->startSetup();


        if(version_compare($context->getVersion(), '1.2.6', '<')) {
            if (!$installer->tableExists('product_daily_deal')) {
                $table = $installer->getConnection()->newTable(
                    $installer->getTable('product_daily_deal')
                )
                    ->addColumn(
                        'id_product_deal',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        null,
                        [
                            'identity' => true,
                            'nullable' => false,
                            'primary'  => true,
                            'unsigned' => true,
                        ],
                        'Product Deal ID'
                    )
                    ->addColumn(
                        'id_product',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        null,
                        ['nullable => false'],
                        'Product ID'
                    )
                    ->addColumn(
                        'id_deal',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        null,
                        [],
                        'ID Daily Deal'
                    )
                    ->addColumn(
                        'quantity_remain_deal',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        '255',
                        [],
                        'Quantity Daily Deal'
                    )
                    ->addColumn(
                        'deal_price',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        '255',
                        [],
                        'Deal Price'
                    )
//                    ->addColumn(
//                        'date_deal_start',
//                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
//                        null,
//                        ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
//                        'Date Deal Start'
//                    )->addColumn(
//                        'date_deal_end',
//                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
//                        null,
//                        ['nullable' => false,'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
//                        'Date End ')
//                    ->addColumn(
//                        'daily_deal_enable',
//                        \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
//                        null,
//                        ['nullable' => false,'default' => false],
//                        'Daily Deal Enable')

                    ->setComment('Daily Deal Table');
                $installer->getConnection()->createTable($table);

                $installer->getConnection()->addIndex(
                    $installer->getTable('daily_deal'),
                    $setup->getIdxName(
                        $installer->getTable('daily_deal'),
                        ['daily_deal_title','percent','quantity_daily_deal','date_start','date_end','daily_deal_enable'],
                        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                    ),
                    ['daily_deal_title','percent','quantity_daily_deal','date_start','date_end','daily_deal_enable'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                );
            }
        }

//
        if(version_compare($context->getVersion(), '1.1.9', '<')) {
			if (!$installer->tableExists('daily_deal')) {
				$table = $installer->getConnection()->newTable(
					$installer->getTable('daily_deal')
				)
					->addColumn(
						'id_daily_deal',
						\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
						null,
						[
							'identity' => true,
							'nullable' => false,
							'primary'  => true,
							'unsigned' => true,
						],
						'Dailydeal ID'
					)
					->addColumn(
						'daily_deal_title',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						255,
						['nullable => false'],
						'Title Daily Deal'
					)
					->addColumn(
						'price_for_deal',
						\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
						255,
						[],
						'Percent'
					)
					->addColumn(
						'quantity_daily_deal',
						\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
						'255',
						[],
						'Quantity Daily Deal'
					)
                    ->addColumn(
                        'date_start',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                        'Date Start'
                    )->addColumn(
                        'date_end',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false,'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                        'Date End ')
                    ->addColumn(
                        'daily_deal_enable',
                        \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                        null,
                        ['nullable' => false,'default' => false],
                        'Daily Deal Enable')

					->setComment('Daily Deal Table');
				$installer->getConnection()->createTable($table);

				$installer->getConnection()->addIndex(
					$installer->getTable('daily_deal'),
					$setup->getIdxName(
						$installer->getTable('daily_deal'),
						['daily_deal_title','price_for_deal','quantity_daily_deal','date_start','date_end','daily_deal_enable'],
						\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
					),
                    ['daily_deal_title','price_for_deal','quantity_daily_deal','date_start','date_end','daily_deal_enable'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				);
			}
		}


//


        if(version_compare($context->getVersion(), '1.1.4', '<')) {
            if (!$installer->tableExists('hospital')) {
                $table = $installer->getConnection()->newTable(
                    $installer->getTable('hospital')
                )
                    ->addColumn(
                        'id_hospital',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        null,
                        [
                            'identity' => true,
                            'nullable' => false,
                            'primary'  => true,
                            'unsigned' => true,
                        ],
                        'Hospital ID'
                    )
                    ->addColumn(
                        'title',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        ['nullable => false'],
                        'Title Hospital'
                    )
                    ->addColumn(
                        'address',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        [],
                        'Address'
                    )
                    ->addColumn(
                        'telephone',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        '255',
                        [],
                        'Telephone'
                    )
                    ->setComment('Hospital Table');
                $installer->getConnection()->createTable($table);

                $installer->getConnection()->addIndex(
                    $installer->getTable('hospital'),
                    $setup->getIdxName(
                        $installer->getTable('hospital'),
                        ['title','address','telephone'],
                        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                    ),
                    ['title','address','telephone'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                );
            }
        }

        $installer->endSetup();
	}
}
