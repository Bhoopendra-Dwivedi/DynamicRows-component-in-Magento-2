<?php

namespace Bhoopendra\DynamicField\Controller\Adminhtml\Field;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\ImportExport\Controller\Adminhtml\Export\Index
{
   public function execute()
   {
       $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
       $resultPage->setActiveMenu('Bhoopendra_DynamicField::dynamic_field');
       $resultPage->getConfig()->getTitle()->prepend(__('Dynamic Field'));
       $resultPage->getConfig()->getTitle()->prepend(__('Dynamic Field'));
       $resultPage->addBreadcrumb(__('Dynamic Field'), __('Dynamic Field'));
       return $resultPage;
   }
   protected function _isAllowed()
   {
       return $this->_authorization->isAllowed('Bhoopendra_DynamicField::dynamic_field');
   }
}