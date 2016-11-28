<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/17
 * Time: 13:43
 */
class Jing_Exercise_Model_Tem extends core_Mage_Model_Template
{
    protected $_preprocessFlag = false;

    protected $_mail;

    protected function _construct()
    {
        $this->init('exercise/tem');
    }

    public function validate()
    {
        $validators = array(
            'tem_code'         => array(Zend_Filter_Input::ALLOW_EMPTY => false),
            'tem_type'         => 'Int',
            'tem_sender_email' => 'EmailAddress',
            'tem_sender_name'  => array(Zend_Filter_Input::ALLOW_EMPTY => false)
        );
        $data = array();
        foreach (array_keys($validators) as $validateField) {
            $data[$validateField] = $this->getDataUsingMethod($validateField);
        }

        $validateInput = new Zend_Filter_Input(array(), $validators, $data);
        if (!$validateInput->isValid()) {
            $errorMessages = array();
            foreach ($validateInput->getMessages() as $messages) {
                if (is_array($messages)) {
                    foreach ($messages as $message) {
                        $errorMessages[] = $message;
                    }
                }
                else {
                    $errorMessages[] = $messages;
                }
            }

            Mage::throwException(join("\n", $errorMessages));
        }
    }

}