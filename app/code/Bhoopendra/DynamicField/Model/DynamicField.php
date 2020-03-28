<?php

namespace Bhoopendra\DynamicField\Model;

class DynamicField extends \Magento\Framework\Model\AbstractModel
{
   protected function _construct()
   {
       $this->_init('Bhoopendra\DynamicField\Model\ResourceModel\DynamicField');
   }
}