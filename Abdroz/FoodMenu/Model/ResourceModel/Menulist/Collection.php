<?php

namespace Abdroz\FoodMenu\Model\ResourceModel\Menulist;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'abdroz_foodmenu_menulist_collection';
    protected $_eventObject = 'menulist_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Abdroz\FoodMenu\Model\Menulist', 'Abdroz\FoodMenu\Model\ResourceModel\Menulist');
    }
}
