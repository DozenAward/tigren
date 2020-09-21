<?php
namespace Mageplaza\HelloWorld\Block;
 
//use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\View\Element\Template;
use Mageplaza\HelloWorld\Model\ResourceModel\Post\Collection;

class Test extends \Magento\Framework\View\Element\Template
{
     protected  $collection;


     public function __construct(
          \Magento\Framework\View\Element\Template\Context $context,
          \Mageplaza\HelloWorld\Model\PostFactory $postFactory,
          Collection $collection,
          array $data = []
          )
     {
          parent::__construct($context,$data);
//          $this->_postFactory = $postFactory;
         $this->collection =$collection;
     }

 
//     public function getResult()
//     {
//          $post = $this->_postFactory->create();
//          $collection = $post->getCollection();
//          return $collection;
////
//     }
    public function getAllCars() {
        return $this->collection;
    }
}