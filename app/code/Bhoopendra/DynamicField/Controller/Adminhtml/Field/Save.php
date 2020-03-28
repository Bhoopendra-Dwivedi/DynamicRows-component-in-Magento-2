<?php

namespace Bhoopendra\DynamicField\Controller\Adminhtml\Field;

class Save extends \Magento\Backend\App\Action
{
   protected $dynamicFieldFactory;
   protected $dynamicFieldResource;

   public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Bhoopendra\DynamicField\Model\DynamicFieldFactory $dynamicFieldFactory,
       \Bhoopendra\DynamicField\Model\ResourceModel\DynamicFieldFactory $dynamicFieldResource
   ) {
       parent::__construct($context);
       $this->dynamicFieldFactory = $dynamicFieldFactory;
       $this->dynamicFieldResource = $dynamicFieldResource;
   }

   public function execute()
   {
       try {
           $dynamicResource = $this->dynamicFieldResource->create();
           $dynamicData = $this->getRequest()->getParam('dynamic_rows_container');           
           $dynamicResource->deleteDynamicRows();
           if (is_array($dynamicData) && !empty($dynamicData)) {
               foreach ($dynamicData as $dynamicValue) {
                   $model = $this->dynamicFieldFactory->create();
                   unset($dynamicValue['id']);
                   $model->addData($dynamicValue);
                   $model->save();
               }
           }
           $this->messageManager->addSuccessMessage(__('Field have been saved successfully'));
       } catch (\Exception $e) {
           $this->messageManager->addErrorMessage(__($e->getMessage()));
       }
       $this->_redirect('*/*/index/scope/stores');
   }
   protected function _isAllowed()
   {
       return $this->_authorization->isAllowed('Bhoopendra_DynamicField::dynamic_field');
   }

}