<?php 
namespace Mageplaza\HelloWorld\Controller\Index;
 
class Test extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     // protected $_postFactory;

 
     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory
          // \Mageplaza\HelloWorld\Model\PostFactory $postFactory
          )
     {
          $this->_pageFactory = $pageFactory;
          // $this->_postFactory = $postFactory;
          return parent::__construct($context);
     }
 
     public function execute()
     {    
          
          if($_POST){
          
               echo "thưởng";
               $test= $block->getResult();
               $data="Done Ajax";
               
               echo($data);
               
               
          }
          else{
               // return "Done1";
          return $this->_pageFactory->create();}
     }
}