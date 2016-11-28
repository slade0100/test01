<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/17
 * Time: 14:48
 */
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('exercise/tem'))
    ->addColumn('tem_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
    'identity'  => true,
    'unsigned'  => true,
    'nullable'  => false,
    'primary'   => true,
       ), 'Tem Id')
    ->addColumn('tem_code', Varien_Db_Ddl_Table::TYPE_TEXT, 150, array(
      ), 'Tem Code')
    ->addColumn('tem_text', Varien_Db_Ddl_Table::TYPE_TEXT, '64k', array(
       ), 'Tem Text')
    ->addColumn('tem_text_preprocessed', Varien_Db_Ddl_Table::TYPE_TEXT, '64k', array(
       ), 'Tem Text Preprocessed')
    ->addColumn('tem_styles', Varien_Db_Ddl_Table::TYPE_TEXT, '64k', array(
       ), 'Tem Styles')
    ->addColumn('tem_type', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
       ), 'Tem Type')
    ->addColumn('tem_subject', Varien_Db_Ddl_Table::TYPE_TEXT, 200, array(
       ), 'Tem Subject')
    ->addColumn('tem_sender_name', Varien_Db_Ddl_Table::TYPE_TEXT, 200, array(
       ), 'Tem Sender Name')
    ->addColumn('tem_sender_email', Varien_Db_Ddl_Table::TYPE_TEXT, 200, array(
      ), 'Tem Sender Email')
    ->addColumn('tem_actual', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'unsigned'  => true,
        'default'   => '1',
       ), 'Tem Actual')
    ->addColumn('added_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
       ), 'Added At')
    ->addColumn('modified_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
       ), 'Modified At')
    ->addIndex($installer->getIdxName('exercise/tem', array('tem_actual')),
        array('tem_actual'))
    ->addIndex($installer->getIdxName('exercise/tem', array('added_at')),
        array('added_at'))
    ->addIndex($installer->getIdxName('exercise/tem', array('modified_at')),
        array('modified_at'))
    ->setComment('Exercise Tem');
$installer->getConnection()->createTable($table);