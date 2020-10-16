<?php
namespace ViMagento\HelloWorld\Controller\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use ViMagento\HelloWorld\Model\PostFactory;
use ViMagento\HelloWorld\Model\ResourceModel\Post;

class Save extends Action
{
    protected $_postFactory;

    function __construct(Context $context, PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
        parent::__construct($context);
    }

    function execute()
    {
        $model = $this->_postFactory->create();
        $model->setData('name', 'Xuan Vinh');
        $model->setData('post_content', 'Su dung Model');
        $model->setData('status', '1');

        $model->save();
    }
}