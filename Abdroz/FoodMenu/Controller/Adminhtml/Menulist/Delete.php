<?php
namespace Abdroz\FoodMenu\Controller\Adminhtml\Menulist;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;
use Abdroz\FoodMenu\Model\MenulistFactory;

class Delete extends Action
{
    protected $resultRedirectFactory;
    protected $messageManager;
    protected $menuListFactory;

    public function __construct(
        Action\Context $context,
        RedirectFactory $resultRedirectFactory,
        ManagerInterface $messageManager,
        MenulistFactory $menuListFactory
    ) {
        parent::__construct($context);
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->messageManager = $messageManager;
        $this->menuListFactory = $menuListFactory;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $resultRedirect = $this->resultRedirectFactory->create();

        if ($id) {
            try {
                $model = $this->menuListFactory->create()->load($id);
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccessMessage(__('The record has been deleted.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }
        } else {
            $this->messageManager->addErrorMessage(__('ID not found.'));
        }

        return $resultRedirect->setPath('*/*/index');
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('abdroz_foodmenu::entity_delete');
    }
}
