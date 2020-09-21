<?php
namespace Mageplaza\HelloWorld\Controller\Index;
 
class Edit extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_request;
     protected $_coreRegistry;
     protected $_postFactory;
 
     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Magento\Framework\App\Request\Http $request,
          \Magento\Framework\Registry $coreRegistry,
          \Mageplaza\HelloWorld\Model\PostFactory $postFactory
          )
     {
          $this->_pageFactory = $pageFactory;
          $this->_postFactory = $postFactory;
          $this->_request = $request;
          $this->_coreRegistry = $coreRegistry;
          return parent::__construct($context);
     }
 
     public function execute()
     {  echo("edit");
        $id = $this->_request->getParam('id');
        $postData =  $this->_request->getParams();
        if($_POST){
            echo ("POST");
            // echo ($_POST['name']);
            // $id=
            $name=$postData['name'];
            $url_key=$_POST['url_key'];
            $post_content=$_POST['post_content'];
            $feature_image=$_POST['featured_image'];
            $data = array('name'=>$name,'url_key'=>$url_key,'post_content'=>$post_content,'feature_image'=>$feature_image);
            $post = $this->_postFactory->create();
            // $saveid = $post ->setData($data);
            $saveid=$post->load($id)->addData($data);
            $saveid->setId($id)->save();
            return $this->_redirect('helloworld/index/index');
          //   echo("DOne");
        }
        else {
            echo ("GET");
        }

        
        print_r($id);
        echo ("1");
        $this->_coreRegistry->register('editRecordId', $id);
          return $this->_pageFactory->create();
          // return $this->_redirect('helloworld/index/index');
     }
}