<?php

namespace Bhoopendra\DynamicField\Model;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
   protected $loadedData;
   protected $collection;
   protected $collectionFactory;
   public function __construct(
       $name,
       $primaryFieldName,
       $requestFieldName,
       \Bhoopendra\DynamicField\Model\ResourceModel\DynamicField\Collection $collection,
       \Bhoopendra\DynamicField\Model\ResourceModel\DynamicField\CollectionFactory $collectionFactory,
       array $meta = [],
       array $data = []
   ) {
       $this->collection = $collection;
       $this->collectionFactory = $collectionFactory;
       parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
   }
   public function getData()
   {
       if (isset($this->loadedData)) {
           return $this->loadedData;
       }
       $collection = $this->collectionFactory->create()->setOrder('position', 'ASC');
       $items = $collection->getItems();
       foreach ($items as $item) {
           $this->loadedData['stores']['dynamic_rows_container'][] = $item->getData();
       }
       return $this->loadedData;
   }
}