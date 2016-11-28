<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/17
 * Time: 13:43
 */
class Jing_Exercise_Model_Resource_Tem extends core_Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('exercise/tem', 'tem_id');
    }

    public function loadByCode(Mage_Exercise_Model_Tem $object, $temCode)
    {
        $read = $this->_getReadAdapter();
        if ($read && !is_null($temCode)) {
            $select = $this->_getLoadSelect('template_code', $temCode, $object)
                ->where('tem_actual = :tem_actual');
            $data = $read->fetchRow($select, array('tem_actual'=>1));

            if ($data) {
                $object->setData($data);
            }
        }

        $this->_afterLoad($object);

        return $this;
    }

    /**
     * Check usage of template in queue
     *
     * @param Mage_Newsletter_Model_Template $template
     * @return boolean
     */
    public function checkUsageInQueue(Mage_Exercise_Model_Tem $tem)
    {
        if ($tem->getTemActual() !== 0 && !$tem->getIsSystem()) {
            $select = $this->_getReadAdapter()->select()
                ->from($this->getTable('exercise/ '), new Zend_Db_Expr('COUNT(queue_id)'))
                ->where('tem_id = :tem_id');

            $countOfQueue = $this->_getReadAdapter()->fetchOne($select, array('tem_id'=>$tem->getId()));

            return $countOfQueue > 0;
        } elseif ($tem->getIsSystem()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Check usage of template code in other templates
     *
     * @param Mage_Newsletter_Model_Template $template
     * @return boolean
     */
    public function checkCodeUsage(Mage_Newsletter_Model_Tem $tem)
    {
        if ($tem->getTemActual() != 0 || is_null($tem->getTemActual())) {
            $bind = array(
                'tem_id'     => $tem->getId(),
                'tem_code'   => $tem->getTemCode(),
                'tem_actual' => 1
            );
            $select = $this->_getReadAdapter()->select()
                ->from($this->getMainTable(), new Zend_Db_Expr('COUNT(tem_id)'))
                ->where('tem_id != :tem_id')
                ->where('tem_code = :tem_code')
                ->where('tem_actual = :teme_actual');

            $countOfCodes = $this->_getReadAdapter()->fetchOne($select, $bind);

            return $countOfCodes > 0;
        } else {
            return false;
        }
    }

}