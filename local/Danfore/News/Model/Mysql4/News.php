<?php

class Danfore_News_Model_Mysql4_News extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
// Note that the news_id refers to the key field in your database table.
        $this->_init('news/news', 'news_id');
    }

    public function getActiveNews()
    {
        $adapter = $this->getReadConnection();
        $select = $adapter->select()
            ->from($this->getMainTable())
            ->where('status = ?', 1);
        return $adapter->fetchAll($select);
    }

    public function viewAction()
    {
        $resource = Mage::getSingleton('core/resource');
        $read = $resource->getConnection('core_read');
        $newsTable = $resource->getTableName('news');

        $select = $read->select()
            ->from($newsTable, array('news_id', 'filename', 'title',
                'content', 'status', 'update_time'))
            ->where('status', 1)
            ->order('created_time DESC');
        $result = $read->fetchRow($select);
        return $result;
    }

    public function getLatestNews()
    {
        $adapter = $this->getReadConnection();
        $select = $adapter->select()
            ->from(
                $this->getTable('news/news'),
                array('news_id', 'title', 'filename', 'content', 'status')
            )
            ->where('status', 1);
        $result = $adapter->fetchAll($select);
        var_dump($result);die();
        return $result;

    }
}
?>