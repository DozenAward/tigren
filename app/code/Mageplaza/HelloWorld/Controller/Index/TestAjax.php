<?php 
namespace Mageplaza\HelloWorld\Controller\Index;
 
class TestAjax extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
    //  protected $_postFactory;

 
     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory
        //   \Mageplaza\HelloWorld\Model\PostFactory $postFactory
          
          )
     {
        $this->_pageFactory = $pageFactory;
        
          return parent::__construct($context);
     }
 
     public function execute()
     
     {


        $id = $this->_request->getParam('id');
        // echo "$id";
        
        // $postData =  $this->_request->getParams();
        // if($_POST){
            $updatedata = array('status'=>1);
            // $post = $this->_postFactory->create();
            // $saveid=$blockInstance->load($id)->addData($updatedata);
            // $saveid->setId($id)->save();
            

        
            $blockInstance = $this->_objectManager->get('Mageplaza\HelloWorld\Block\TestAjax');
            // $saveid=$blockInstance->load($id)->addData($updatedata);
            // $saveid->setId($id)->save();
            if($id!=0){

            $collection=$blockInstance->updateData($id);
        }


            $collection=$blockInstance->getResult();
            // echo"Thưởng";
            // $test= $block->getResult();
                $data="";
                foreach($collection as $item){
                    //    echo $item->getData('post_id');
                        $temp= "<tr><td>".$item->getData('post_id')."</td>
                        <td>".$item->getData('name')."</td>
                        <td>".$item->getData('post_content')."</td>
                        <td>".$item->getData('created_at')."</td>
                        <td>".$item->getData('updated_at')."</td>
                        <td><a class='action primary'>Uncompleted !</a></td>";
                    $data.=$temp;
            }
            echo $data;
        // }
     }
}