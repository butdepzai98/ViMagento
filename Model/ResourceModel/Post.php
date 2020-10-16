<?php
namespace ViMagento\HelloWorld\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Post extends AbstractDb
{
    function _construct()
    {
        $this->_init('vimagento_helloworld_post', 'post_id');
    }
}