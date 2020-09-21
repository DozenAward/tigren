<?php

namespace Mageplaza\HelloWorld\Controller\Index;
 
class Insert extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_postFactory;

     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Mageplaza\HelloWorld\Model\PostFactory $postFactory
          )
     {
          $this->_postFactory = $postFactory;
          $this->_pageFactory = $pageFactory;
          return parent::__construct($context);
     }
 
     public function execute()
     {      

        // $data = array('post_id'=>4,'name'=>'how are you','status'=>0);
        // $model = Mage::getModel('post/post')->setData($data);
        // try {
        //     $insertId = $model->save()->getId();
        //     echo "Data successfully inserted. Insert ID: ".$insertId;
        // } catch (Exception $e){
        // echo $e->getMessage();   
// }
        // echo("th");
        // $data = array('post_id'=>'3','name'=>'thuong');
        // $post = $this->_postFactory->create();
        // $model =$post->setData($data);
        // try {
        //     $insertId = $model->save()->getId();
        //     echo "Data has been saved successfully. Insert ID: ".$insertId;
        //     } catch (Exception $e){
        //     echo $e->getMessage();  
        // }

        // $postData = $this->$request->getParams();
        if($_POST){
            echo ("POST");
            echo ($_POST['name']);
            $name=$_POST['name'];
            $url_key=$_POST['url_key'];
            $post_content=$_POST['post_content'];
            $feature_image=$_POST['featured_image'];
            $data = array('name'=>$name,'url_key'=>$url_key,'post_content'=>$post_content,'featured_image'=>$feature_image);
            $post = $this->_postFactory->create();
            $saveid = $post ->setData($data);
            $saveid->save()->getId();
            return $this->_redirect('helloworld/index/index');
            echo("Done");
        }
        else {
            echo ("GET");
        }
        return $this->_pageFactory->create();
        //   echo "thưởng";
        // return $this->_redirect('helloworld/index/index');
     
    
    }
}