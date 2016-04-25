<?php

namespace MagentoHackathon\MagentoMigrations;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 *
 * @author Gabriel Somoza <gabriel.somoza@cu.be>
 */
class InstallSchema
{
    /** Name for the migrations table */
    const MIGRATIONS_TABLE = 'migrations';

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $connection = $installer->getConnection();

        $table = $connection->newTable(self::MIGRATIONS_TABLE);
        $table->addColumn(
            'id',
            Table::TYPE_TEXT,
            null,
            [
                'nullable' => false,
                'primary' => true,
            ]
        );
        $table->addColumn('migrated_at', Table::TYPE_DATETIME);

        $connection->createTable($table);
        $installer->endSetup();
    }
}
