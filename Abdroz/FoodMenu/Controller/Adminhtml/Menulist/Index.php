<?php

namespace Abdroz\FoodMenu\Controller\Adminhtml\Menulist;

use Abdroz\FoodMenu\Model\ResourceModel\Menulist\CollectionFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;
    protected $collectionFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        CollectionFactory $collectionFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->collectionFactory = $collectionFactory; 
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Food Menu')));

        return $resultPage;
    }
}
