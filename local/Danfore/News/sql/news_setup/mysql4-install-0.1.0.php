<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/21
 * Time: 14:59
 */
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('news/news'))
    ->addColumn('news_id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        array(
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary' => true,
        ), 'News Id')
    ->addColumn('title',
        Varien_Db_Ddl_Table::TYPE_VARCHAR,
        255,
        array(
            'nullable' => false,
            'default' => '',
        ), 'Title')
    ->addColumn('filename',
        Varien_Db_Ddl_Table::TYPE_VARCHAR,
        255,
        array(
            'nullable' => false,
            'default' => '',
        ), 'Filename')
    ->addColumn('content',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        null,
        array(
            'nullable' => false,
            'default' => '',
        ), 'Content')
    ->addColumn('status',
        Varien_Db_Ddl_Table::TYPE_SMALLINT,
        6,
        array(
            'nullable' => false,
            'default' => 0,
        ), 'Status')
    ->addColumn('created_time',
        Varien_Db_Ddl_Table::TYPE_DATETIME,
        null,
        array(), 'Created Time')
    ->addColumn('updated_time',
        Varien_Db_Ddl_Table::TYPE_DATETIME,
        null,
        array(),
        'Updated Time'
    )->setComment('News Table');
$installer->getConnection()->createTable($table);
$installer->endSetup();
?>    