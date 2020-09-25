<?php
namespace Mageplaza\HelloWorld\Controller\Index;
class TestEvent extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $textDisplay = new \Magento\Framework\DataObject(array('text' => 'Mageplaza'));
        $this->_eventManager->dispatch(magenest_display_text, ['mp_text' => $textDisplay]);
        echo $textDisplay->getText();
        exit;
    }
}