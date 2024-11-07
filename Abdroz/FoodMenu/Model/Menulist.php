<?php

namespace Abdroz\FoodMenu\Model;

class Menulist extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'abdroz_foodmenu_menulist';

    protected $_cacheTag = 'abdroz_foodmenu_menulist';

    protected $_eventPrefix = 'abdroz_foodmenu_menulist';

    protected function _construct()
    {
        $this->_init('Abdroz\FoodMenu\Model\ResourceModel\Menulist');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
