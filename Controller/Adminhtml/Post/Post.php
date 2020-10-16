<?php
namespace ViMagento\HelloWorld\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Post extends Action
{
    protected $_pageFactory;

    function __construct(Action\Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);    
        $this->_pageFactory = $pageFactory;
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Post ViMagento'));
        return $resultPage;
    }
}