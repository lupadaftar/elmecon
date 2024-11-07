<?php

namespace Abdroz\FoodMenu\Model\Api;

use Abdroz\FoodMenu\Api\ResponseItemInterface;
use Magento\Framework\DataObject;

/**
 * Class ResponseItem
 */
class ResponseItem extends DataObject implements ResponseItemInterface
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
