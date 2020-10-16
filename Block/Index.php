<?php
namespace ViMagento\HelloWorld\Block;
 
use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
 
class Index extends \Magento\Framework\View\Element\Template
{
    protected $_productFactory;

    public function __construct(
        Template\Context $context, 
        CollectionFactory $productFactory, 
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->_productFactory = $productFactory;
    }
 
    public function getProduct()
    {
        $product = $this->_productFactory->create();
        $product->addAttributeToSelect('*')->setPageSize(10);
        return $product;
    }

    function getName($a, $b)
    {
        return [$a, $b];
    }
}