<?php

/* @var $this Mage_Core_Model_Resource_Setup */
$this->startSetup();

$this->getConnection()->dropTable($this->getTable('aoe_profiler/run'));

/**
 * Create table 'aoe_profiler/profile'
 */
$table = $this->getConnection()
    ->newTable($this->getTable('aoe_profiler/run'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
    ), 'Profile Id')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(), 'Creation time')
    ->addColumn('stack_data', Varien_Db_Ddl_Table::TYPE_VARBINARY, Varien_Db_Ddl_Table::MAX_VARBINARY_SIZE, array(), 'Data')
    ->addColumn('route', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(), 'Route')
    ->addColumn('url', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(), 'Url')
    ->addColumn('session_id', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(), 'Session ID')
    ->addColumn('total_time', Varien_Db_Ddl_Table::TYPE_FLOAT, null, array(), 'Total Time in seconds')
    ->addColumn('total_memory', Varien_Db_Ddl_Table::TYPE_FLOAT, null, array(), 'Total Memory in MB')
    ->addColumn('user_agent', Varien_Db_Ddl_Table::TYPE_TEXT, '64k', array(), 'User Agent')
    ->addColumn('request_method', Varien_Db_Ddl_Table::TYPE_VARCHAR, 10, array(), 'Request Method')
    ->addColumn('request_data', Varien_Db_Ddl_Table::TYPE_TEXT, '64k', array(), 'Request Data')
    ->addColumn('remote_address', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(), 'Remote Address')
    ->addColumn('hostname', Varien_Db_Ddl_Table::TYPE_VARCHAR, 128, array(), 'Hostname');
$this->getConnection()->createTable($table);

$this->endSetup();
