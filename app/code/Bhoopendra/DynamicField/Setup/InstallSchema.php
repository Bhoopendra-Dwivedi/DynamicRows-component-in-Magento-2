<?php

namespace Bhoopendra\DynamicField\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table as Table;
 
class InstallSchema implements InstallSchemaInterface
{
   public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
   {
       $installer = $setup;
       $installer->startSetup();
       $table = $installer->getConnection()->newTable(
           $installer->getTable('bhoopendra_dynamic_field')
       )->addColumn(
           'id',
           Table::TYPE_INTEGER,
           null,
           ['identity' => true, 'nullable' => false, 'primary' => true],
           'ID'
       )->addColumn(
           'name',
           Table::TYPE_TEXT,
           null,
           ['nullable' => false],
           'Row Name'
       )->addColumn(
           'position',
           Table::TYPE_INTEGER,
           null,
           ['nullable' => false],
           'Position'
       )->setComment(
           'Bhoopendra Dynamic Rows'
       );
       $installer->getConnection()->createTable($table);
       $installer->endSetup();
   }
}