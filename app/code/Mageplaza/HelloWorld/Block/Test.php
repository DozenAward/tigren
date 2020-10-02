<?php
namespace Mageplaza\HelloWorld\Block;

use Magento\Framework\App\Filesystem\DirectoryList;

class Test extends \Magento\Framework\View\Element\Template
{
    protected $_filesystem;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Mageplaza\HelloWorld\Model\PostFactory $postFactory
    )
    {
        parent::__construct($context);
        $this->_postFactory = $postFactory;
    }

    public function getResult()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection()->addFieldToFilter(
        'status', 0
    );
        return $collection;
    }
}