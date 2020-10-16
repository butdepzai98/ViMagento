<?php
namespace ViMagento\HelloWorld\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use ViMagento\HelloWorld\Model\ResourceModel\Post\CollectionFactory;
use ViMagento\HelloWorld\Model\PostFactory;
use Magento\Ui\Component\MassAction\Filter;

class Delete extends Action 
{
    private $postFactory;
    private $filter;
    private $collectionFactory;

    public function __construct(
        Action\Context $context,
        PostFactory $postFactory,
        Filter $filter,
        CollectionFactory $collectionFactory
    )
    {
        parent::__construct($context);
        $this->postFactory = $postFactory;
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
    }

    function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $total = 0;
        $err = 0;
        foreach ($collection->getItems() as $item) {
            $deletePost = $this->postFactory->create()->load($item->getData('post_id'));
            try {
                $deletePost->delete();
                $total++;
            } catch (LocalizedException $exception) {
                $err++;
            }
        }
 
        if ($total) {
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been deleted.', $total)
            );
        }
 
        if ($err) {
            $this->messageManager->addErrorMessage(
                __(
                    'A total of %1 record(s) haven\'t been deleted. Please see server logs for more details.',
                    $err
                )
            );
        }
        return $this->_redirect('ad_helloworld/post/post');
    }
}