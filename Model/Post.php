<?php
namespace ViMagento\HelloWorld\Model;

use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('ViMagento\HelloWorld\Model\ResourceModel\Post');
    }
}