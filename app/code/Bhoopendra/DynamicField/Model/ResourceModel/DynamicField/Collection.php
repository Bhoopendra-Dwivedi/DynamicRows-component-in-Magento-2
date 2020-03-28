<?php

namespace Bhoopendra\DynamicField\Model\ResourceModel\DynamicField;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
   protected $_idFieldName = 'id';
   protected function _construct()
   {
       $this->_init(
           'Bhoopendra\DynamicField\Model\DynamicField',
           'Bhoopendra\DynamicField\Model\ResourceModel\DynamicField'
       );
   }
}