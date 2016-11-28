<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/21
 * Time: 15:23
 */

class  Danfore_News_Block_Adminhtml_News_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
public function __construct()
{
    parent::__construct();
    $this->_objectId =  'id';
    $this->_blockGroup = 'news';
    $this->_controller = 'adminhtml_news';
    $this->_updateButton('save', 'label', Mage::helper('news')->__('Save Item'));
    $this->_updateButton('delete', 'label',Mage::helper('news')->__('Delete Item'));
    $this->_addButton('saveandcontinue', array('label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
        'onclick' => 'saveAndContinueEdit()',  'class' => 'save',), -100);
    $this->_formScripts[] = "function toggleEditor() {   
    if (tinyMCE.getInstanceById('news_content') == null) {   
    tinyMCE.execCommand('mceAddControl', false, 'news_content');       
} else {   
    tinyMCE.execCommand('mceRemoveControl', false, 'news_content');
}
}
function saveAndContinueEdit()
{
editForm.submit($('edit_form').action+'back/edit/');
}
 ";
}
    public function getHeaderText()
    {
        if (Mage::registry('news_data') && Mage::registry('news_data')->getId()) {
            return Mage::helper('news')->__("Edit Item '%s'",  $this->htmlEscape(Mage::registry('news_data')->getTitle()));
        } else {
            return Mage::helper('news')->__('Add Item');
        }
    }
}