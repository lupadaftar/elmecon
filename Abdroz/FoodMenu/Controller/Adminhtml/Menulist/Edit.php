<?php

namespace Abdroz\FoodMenu\Controller\Adminhtml\Menulist;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Abdroz\FoodMenu\Model\MenulistFactory;

class Edit extends Action
{
    protected $resultPageFactory;

    protected $menulistFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        MenulistFactory $menulistFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->menulistFactory = $menulistFactory;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $entity = $this->menulistFactory->create();

        if ($id) {
            $entity->load($id);
        }

        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__($entity->getName()));

        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('abdroz_foodmenu::entity_edit');
    }
}
