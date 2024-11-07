<?php

namespace Abdroz\FoodMenu\Controller\Adminhtml\Menulist;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Abdroz\FoodMenu\Model\ResourceModel\Menulist\CollectionFactory;

class ChangeStatus extends Action
{
    protected $filter;
    protected $collectionFactory;

    public function __construct(
        Action\Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        // Retrieve action from URL (e.g., enable or disable)
        $statusAction = $this->getRequest()->getParam('action');
        $status = ($statusAction === 'enable') ? 1 : 0;

        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $updated = 0;

        foreach ($collection as $item) {
            $item->setStatus($status);
            $item->save();
            $updated++;
        }

        $statusLabel = $status ? 'enabled' : 'disabled';
        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been %2.', $updated, $statusLabel));

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/');
    }
}
