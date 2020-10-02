<?php
namespace Mageplaza\HelloWorld\Block;

use Magento\Framework\App\Filesystem\DirectoryList;

class TestAjax extends \Magento\Framework\View\Element\Template
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



    public function updateData($id_update){
        $dataupdate=array('status'=>1);
        $post = $this->_postFactory->create();
        $saveid=$post->load($id_update)->addData($dataupdate);
        $saveid->setId($id_update)->save();
        echo "Approve confirm completed";
    }

    public function getResult()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection()->addFieldToFilter(
        'status', 1
    );
        return $collection;
    }
}