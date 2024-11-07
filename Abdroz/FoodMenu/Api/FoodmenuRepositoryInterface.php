<?php

namespace Abdroz\FoodMenu\Api;

interface FoodmenuRepositoryInterface
{
    /**
     * Return all data.
     *
     * @return \Abdroz\FoodMenu\Api\ResponseItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getMenu();
    /**
     * Return a filtered data.
     *
     * @param int $id
     * @return \Abdroz\FoodMenu\Api\ResponseItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getId(int $id);
    /**
     * Return a filtered data.
     *
     * @param string $status
     * @return \Abdroz\FoodMenu\Api\ResponseItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getStatus(string $status);
    /**
     * Return a filtered data.
     *
     * @param string $name
     * @return \Abdroz\FoodMenu\Api\ResponseItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getName(string $name);
    /**
     * Return a filtered data.
     *
     * @param int $price
     * @return \Abdroz\FoodMenu\Api\ResponseItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getPrice(int $price);
    /**
     * Return a filtered data.
     *
     * @param string $ingredients
     * @return \Abdroz\FoodMenu\Api\ResponseItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getIngredients(string $ingredients);
}
