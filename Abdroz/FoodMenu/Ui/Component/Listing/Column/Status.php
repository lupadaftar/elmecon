<?php

namespace Abdroz\FoodMenu\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\Escaper;

class Status extends Column
{
    /**
     * @var Escaper
     */
    protected $escaper;

    /**
     * Constructor
     * 
     * @param Escaper $escaper
     * @param array $data
     */
    public function __construct(
        Escaper $escaper,
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ) {
        $this->escaper = $escaper;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['status'])) {
                    $item['status'] = $item['status'] == 1 
                        ? __('Enable') 
                        : __('Disable');
                }
            }
        }
        return $dataSource;
    }
}
