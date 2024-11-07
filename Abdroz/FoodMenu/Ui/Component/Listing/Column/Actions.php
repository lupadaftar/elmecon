<?php

namespace Abdroz\FoodMenu\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column {

    /** Url path */
    const URL_PATH_EDIT = 'abdroz_foodmenu/menulist/edit';
    const URL_PATH_DELETE = 'abdroz_foodmenu/menulist/delete';
    // const URL_PATH_VIEW = 'abdroz_foodmenu/menulist/view';

    protected $actionUrlBuilder;
    protected $urlBuilder;

    public function __construct(
        ContextInterface $context, 
        UiComponentFactory $uiComponentFactory, 
        UrlInterface $urlBuilder, 
        array $components = [], 
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource) {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item['id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl(
                                self::URL_PATH_EDIT, [
                                    'id' => $item['id']
                                ]
                        ),
                        'label' => __('Edit')
                    ];
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(
                                self::URL_PATH_DELETE, [
                                    'id' => $item['id']
                                ]
                        ),
                        'label' => __('Delete'),
                        'confirm' => [
                            // 'title' => __('Delete "${ $.$data.title }"'),
                            'title' => __('Delete ' . $item['name']),
                            // 'message' => __('Are you sure you wan\'t to delete a "${ $.$data.title }" record?')
                            'message' => __('Are you sure you wan\'t to delete this record?')

                        ]
                    ];
                    // $item[$name]['preview'] = [
                    //     'href' => $this->urlBuilder->getUrl(
                    //             self::URL_PATH_VIEW, [
                    //                 'id' => $item['id']
                    //             ]
                    //     ),
                    //     'label' => __('View')
                    // ];
                }
            }
        }

        return $dataSource;
    }

}