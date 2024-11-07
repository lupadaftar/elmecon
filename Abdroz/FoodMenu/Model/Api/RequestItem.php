<?php

namespace Abdroz\FoodMenu\Model\Api;

use Abdroz\FoodMenu\Api\RequestItemInterface;
use Magento\Framework\DataObject;

/**
 * Class RequestItem
 */
class RequestItem extends DataObject implements RequestItemInterface
{
    public function getId(): int
    {
        return $this->_getData(self::DATA_ID);
    }
    public function getStatus(): bool
    {
        return $this->_getData(self::DATA_STATUS);
    }
    public function getName(): string
    {
        return $this->_getData(self::DATA_NAME);
    }
    public function getPrice(): int
    {
        return $this->_getData(self::DATA_PRICE);
    }
    public function getIngredients(): string
    {
        return $this->_getData(self::DATA_INGREDIENTS);
    }
}
