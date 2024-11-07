<?php

namespace Abdroz\FoodMenu\Controller\Adminhtml\Menulist;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Abdroz\FoodMenu\Model\MenulistFactory;
use Magento\Framework\Controller\ResultFactory;

class Save extends Action
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
        $request = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        try {
            if ($request && isset($request['id'])) {
                $menu = $this->menulistFactory->create();
                $menu->setData($request)->save();

                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));

                $resultRedirect->setUrl($this->_redirect->getRefererUrl());
            } else {
                $menu = $this->menulistFactory->create();
                $menu->setData($request)->save();

                $this->messageManager->addSuccessMessage(__("Data Created Successfully."));

                $resultRedirect->setPath('*/*/index');
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }

        return $resultRedirect;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('abdroz_foodmenu::entity_edit');
    }
}
