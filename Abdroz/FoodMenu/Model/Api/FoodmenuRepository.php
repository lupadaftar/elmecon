<?php

namespace Abdroz\FoodMenu\Model\Api;

use Abdroz\FoodMenu\Api\FoodmenuRepositoryInterface;
use Abdroz\FoodMenu\Api\RequestItemInterfaceFactory;
use Abdroz\FoodMenu\Api\ResponseItemInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Abdroz\FoodMenu\Model\ResourceModel\Menulist\CollectionFactory as menulistFactory;

class FoodmenuRepository implements FoodmenuRepositoryInterface
{
    /**
     * @var RequestItemInterfaceFactory
     */
    private $requestItemFactory;
    /**
     * @var ResponseItemInterfaceFactory
     */
    private $responseItemFactory;
    /**
     * @var MenulistFactory
     */
    private $menulistFactory;
    /**
     * @param CollectionFactory $productCollectionFactory
     * @param RequestItemInterfaceFactory $requestItemFactory
     * @param ResponseItemInterfaceFactory $responseItemFactory
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        RequestItemInterfaceFactory $requestItemFactory,
        ResponseItemInterfaceFactory $responseItemFactory,
        MenulistFactory $menulistFactory
    ) {
        $this->requestItemFactory = $requestItemFactory;
        $this->responseItemFactory = $responseItemFactory;
        $this->menulistFactory = $menulistFactory;
    }
    /**
     * @return Collection
     */
    private function getMenulistCollection(): mixed
    {
        /** @var Collection $collection */
        $collection = $this->menulistFactory->create();

        return $collection;
    }
    /**
     * {@inheritDoc}
     *
     * @return ResponseItemInterface
     * @throws NoSuchEntityException
     */
    public function getMenu(): mixed
    {
        $collection = $this->getMenulistCollection();

        return $collection->getData();
    }
    /**
     * {@inheritDoc}
     *
     * @param int $id
     * @return ResponseItemInterface
     * @throws NoSuchEntityException
     */
    public function getId(int $id): mixed
    {
        $collection = $this->getMenulistCollection()
            ->addFieldToFilter('id', ['eq' => $id]);

        $menu = $collection->getFirstItem();

        if (!$menu->getId()) {
            throw new NoSuchEntityException(__('Data not found'));
        }

        return $menu;
    }
    /**
     * {@inheritDoc}
     *
     * @param string $status
     * @return ResponseItemInterface
     * @throws NoSuchEntityException
     */
    public function getStatus(string $status): mixed
    {
        $collection = $this->getMenulistCollection()
            ->addFieldToFilter('status', ['eq' => $status]);

        if (!$collection->count()) {
            throw new NoSuchEntityException(__('Data not found'));
        }
        return $collection->getData();
    }
    /**
     * {@inheritDoc}
     *
     * @param string $name
     * @return ResponseItemInterface
     * @throws NoSuchEntityException
     */
    public function getName(string $name): mixed
    {
        $collection = $this->getMenulistCollection()
            ->addFieldToFilter('name', ['like' => "%$name%"]);

        if (!$collection->count()) {
            throw new NoSuchEntityException(__('Data not found'));
        }
        return $collection->getData();
    }
    /**
     * {@inheritDoc}
     *
     * @param int $price
     * @return ResponseItemInterface
     * @throws NoSuchEntityException
     */
    public function getPrice(int $price): mixed
    {
        $collection = $this->getMenulistCollection()
            ->addFieldToFilter('price', ['eq' => $price]);

        if (!$collection->count()) {
            throw new NoSuchEntityException(__('Data not found'));
        }
        return $collection->getData();
    }
    /**
     * {@inheritDoc}
     *
     * @param string $ingredients
     * @return ResponseItemInterface
     * @throws NoSuchEntityException
     */
    public function getIngredients(string $ingredients): mixed
    {
        $collection = $this->getMenulistCollection()
            ->addFieldToFilter('ingredients', ['like' => "%$ingredients%"]);

        if (!$collection->count()) {
            throw new NoSuchEntityException(__('Data not found'));
        }
        return $collection->getData();
    }
}
