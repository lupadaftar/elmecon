<?php

namespace Abdroz\FoodMenu\Model;

use Abdroz\FoodMenu\Model\ResourceModel\Menulist\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $menulistCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $menulistCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $menulistCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        $items = $this->collection->getItems();
        $data = [];
        
        foreach ($items as $item) {
            $data[$item->getId()] = $item->getData();
        }

        return $data;
    }
}
