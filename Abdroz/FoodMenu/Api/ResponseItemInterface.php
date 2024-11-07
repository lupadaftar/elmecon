<?php

namespace Abdroz\FoodMenu\Api;

interface ResponseItemInterface
{
    const DATA_ID = 'id';
    const DATA_STATUS = 'status';
    const DATA_NAME = 'name';
    const DATA_PRICE = 'price';
    const DATA_INGREDIENTS = 'ingredients';
    /**
     * @return int
     */
    public function getId();
    /**
     * @return bool
     */
    public function getStatus();
    /**
     * @return string
     */
    public function getName();
    /**
     * @return int
     */
    public function getPrice();
    /**
     * @return string
     */
    public function getIngredients();
}
