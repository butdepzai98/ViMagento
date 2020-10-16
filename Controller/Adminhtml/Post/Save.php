<?php
namespace ViMagento\HelloWorld\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use ViMagento\HelloWorld\Model\PostFactory;

class Save extends Action
{
    protected $_postFactory;
    protected $_redirect;

    function __construct(
        Context $context, 
        PostFactory $postFactory
    )
    {
        $this->_postFactory = $postFactory;
        parent::__construct($context);
    }

    function execute()
    {
        //Lay du lieu tu Form
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['post_id']) ? $data['post_id'] : null;
 
        $newData = [
            'name' => $data['name'],
            'status' => $data['status'],
            'post_content' => $data['post_content'],
        ];
 
        $post = $this->_postFactory->create();
        if ($id) {
            $post->load($id);
            $this->getMessageManager()->addSuccessMessage(__('Edit thành công'));
        } else {
            $this->getMessageManager()->addSuccessMessage(__('Save thành công.'));
        }
        try{
            $post->addData($newData);
            $post->save();
            return $this->_redirect('ad_helloworld/post/post');
        }catch (\Exception $e){
            $this->getMessageManager()->addErrorMessage(__('Save thất bại.'));
        }
        
    }
}