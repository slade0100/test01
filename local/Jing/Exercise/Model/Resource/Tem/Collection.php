<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/17
 * Time: 15:28
 */

class  Jing_Exercise_Model_Resource_Tem_Collection extends core_Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Define resource model and model
     *
     */
    protected function _construct()
    {
        $this->_init('exercise/tem');
    }

    /**
     * Load only actual template
     *
     * @return Mage_Newsletter_Model_Resource_Template_Collection
     */
    public function useOnlyActual()
    {
        $this->addFieldToFilter('tem_actual', 1);

        return $this;
    }

    /**
     * Returns options array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return $this->_toOptionArray('tem_id', 'tem_code');
    }
}