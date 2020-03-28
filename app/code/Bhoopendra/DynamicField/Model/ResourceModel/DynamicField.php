<?php

namespace Bhoopendra\DynamicField\Model\ResourceModel;

class DynamicField extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
   protected function _construct()
   {
       $this->_init('bhoopendra_dynamic_field', 'id');
   }
   public function deleteDynamicRows()
   {
       $connection = $this->getConnection();
       $connection->delete(
           $this->getMainTable(),
           ['id > ?' => 0]
       );
   }

}