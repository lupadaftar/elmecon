<?php

namespace Abdroz\FoodMenu\Model\ResourceModel;


class Menulist extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('abdroz_foodmenu', 'id');
    }
}
