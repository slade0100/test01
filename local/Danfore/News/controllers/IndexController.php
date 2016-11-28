<?php
class Danfore_News_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function viewAction()
    {
        $news_id = $this->getRequest()->getParam('id');
        Mage::register('current_news_id', $news_id);
        $this->loadLayout();
        $this->renderLayout();
    }
}
