<?php
namespace ViMagento\HelloWorld\Controller\Post;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $_pageFactory;

    function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    function execute()
    {
        return $this->_pageFactory->create();
    }
}