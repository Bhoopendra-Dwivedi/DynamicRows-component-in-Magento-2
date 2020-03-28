<?php

namespace Bhoopendra\DynamicField\Block\Adminhtml\DynamicField\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\CatalogRule\Block\Adminhtml\Edit\GenericButton;

class SaveButton extends GenericButton implements ButtonProviderInterface
{
   public function getButtonData()
   {
       $url = $this->getUrl('bhoopendra/field/save');
       return [
           'label' => __('Save'),
           'class' => 'save primary',
           'on_click' => "setLocation('". $url ."'')",
           'sort_order' => 90,
       ];
   }
}