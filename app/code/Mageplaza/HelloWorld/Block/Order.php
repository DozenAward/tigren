<?php
namespace Mageplaza\HelloWorld\Block;
class Order extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Sales\Model\OrderFactory $orderFactory,
        array $data = []
    )
    {
        $this->_checkoutSession = $checkoutSession;
        $this->_orderFactory = $orderFactory;
        parent::__construct($context, $data);
    }
        public function getLastOrder()
        {
            return $this->_checkoutSession->getLastRealOrder();
        }

        public function getOrder()
        {


        $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();
        $orderDatamodel = $objectManager->get('Magento\Sales\Model\Order')->getCollection();
        $orderId   =   $orderDatamodel->getId();
        $order = $objectManager->create('\Magento\Sales\Model\Order')->load('000000019');
        $orderItems = $order->getAllItems();
//            if ($this->_checkoutSession->getLastRealOrderId()) {
//                $order = $this->_orderFactory->create()->loadByIncrementId($this->_checkoutSession->getLastRealOrderId());
////                $order = "ahihi ";
//                return $order;
//            }
            return $orderItems;
        }
    }