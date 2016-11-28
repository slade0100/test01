<?php

class Danfore_News_Model_News extends Mage_Core_Model_Abstract
{
public function _construct()
{
    parent::_construct();
    $this->_init('news/news');
}
    public function getActiveNews()
    {
        return $this->_getResource()->getActiveNews();
    }

    public function getLatestNews()
    {
        return $this->_getResource()->getLatestNews();
    }

}
?>