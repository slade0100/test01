<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/17
 * Time: 16:26
 */
$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

$installer->run("

/*Table structure for table `newsletter_tem` */

-- DROP TABLE IF EXISTS {$this->getTable('exercise_tem')};
CREATE TABLE {$this->getTable('exercise_tem')} (
  `tem_id` int(7) unsigned NOT NULL auto_increment,
  `tem_code` varchar(150) default NULL,
  `tem_text` text,
  `tem_text_preprocessed` text,
  `tem_type` int(3) unsigned default NULL,
  `tem_subject` varchar(200) default NULL,
  `tem_sender_name` varchar(200) default NULL,
  `tem_sender_email` varchar(200) character set latin1 collate latin1_general_ci default NULL,
  `tem_actual` tinyint(1) unsigned default '1',
  `added_at` datetime default NULL,
  `modified_at` datetime default NULL,
  PRIMARY KEY  (`tem_id`),
  KEY `tem_actual` (`tem_actual`),
  KEY `added_at` (`added_at`),
  KEY `modified_at` (`modified_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Exercise tems';

/*Data for the table  exercise_tem` */

insert  into {$this->getTable('exercise_tem')}(`tem_id`,`teme_code`,`tem_text`,`tem_text_preprocessed`,`tem_type`,`tem_subject`,`tem_sender_name`,`tem_sender_email`,`tem_actual`,`added_at`,`modified_at`) values (1,'Great Exercise','This is a GREAT <br> <br> Exercise','This is a GREAT <br> <br>  Exercise',2,'Greatness','Magento','david@varien.com',0,'2007-08-29 17:30:31','2007-08-29 17:30:31'),(2,'Great  Exercise','This is a GREAT <br> <br>  Exercise','This is a GREAT <br> <br>  Exercise',2,'Greatness','Magento','david@varien.com',0,'2007-08-29 17:30:31','2007-08-29 17:30:31'),(3,'Great  Exercise','This is a GREAT <br> <br>  Exercise',NULL,2,'Greatness','Magento','david@varien.com',1,'2007-08-29 17:30:31','2007-08-29 17:30:31');
    ");

$installer->endSetup();
