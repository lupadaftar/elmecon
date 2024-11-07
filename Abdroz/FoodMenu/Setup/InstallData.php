<?php

namespace Abdroz\FoodMenu\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        // Sample data to insert
        $data = [
            [
                'name' => 'Nasi Goreng',
                'price' => 15000,
                'status' => 1,
                'ingredients' => 'nasi'
            ],
            [
                'name' => 'Mie Goreng',
                'price' => 12000,
                'status' => 1,
                'ingredients' => 'mie'
            ]
        ];

        // Insert data into abdroz_foodmenu table
        foreach ($data as $item) {
            $setup->getConnection()->insert(
                $setup->getTable('abdroz_foodmenu'),
                $item
            );
        }

        $setup->endSetup();
    }
}
