<?php
namespace ViMagento\HelloWorld\Ui\Component\Listing\Grid\Column;

use Magento\UI\Component\Listing\Columns\Column;
use Magento\Framework\App\ObjectManager;

class Action extends Column
{
    function prepareDataSource(array $dataSource)
    {
        $obj = ObjectManager::getInstance();
        $store = $obj->create('\Magento\Store\Model\StoreManagerInterface');
        $url = $store->getStore()->getBaseUrl();

        if(isset($dataSource['data']['items']))
        {
            foreach ($dataSource['data']['items'] as & $item ) {
                $item[$this->getData('name')] = [
                    'edit' => [
                        'href' => $url.'admin_m235/ad_helloworld/post/add/id/'.$item["post_id"],
                        'label' => __('Edit')
                    ]
                ];
            }
        }
        return $dataSource;
    }
}