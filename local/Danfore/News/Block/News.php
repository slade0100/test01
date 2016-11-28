<?php

class Danfore_News_Block_News extends Mage_Core_Block_Template
{
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function getNews()
    {
        if (Mage::registry('current_news_id')) {
            $news = Mage::getModel('news/news')->load(Mage::registry('current_news_id'));

            return $news->getData();
        }

        return null;
    }

    public function getNewsList()
    {
        return Mage::getModel('news/news')->getLatestNews();
//        $latestNewsList = Mage::getResourceModel('news/news')
//            ->getLatestNews();
//        return $latestNewsList;
    }

    function limitCharacter($string, $limit = 20, $suffix = ' . . .')
    {
        $string = strip_tags($string);
        if (strlen($string) < $limit) {
            return $string;
        }
        for ($i = $limit; $i >= 0; $i--) {
            $c = $string[$i];
            if ($c == ' ' OR $c == "\n") {
                return substr($string, 0, $i) . $suffix;
            }
        }
        return substr($string, 0, $limit) . $suffix;
    }

    public function getActiveNews()
    {
        return Mage::getModel('news/news')->getActiveNews();
    }

    public function viewAction()
    {
        return Mage::getModel('news/news')->viewAction();
    }

    public function getIndexAction()
    {
        return Mage::getModel('news/news')->getIndexAction();
    }
}