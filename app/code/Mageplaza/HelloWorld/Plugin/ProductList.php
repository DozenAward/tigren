<?php
namespace Mageplaza\HelloWorld\Plugin;

class ProductList
{
    protected $layout;
    protected $hospitalFactory;

    public function __construct(
        \Magento\Framework\View\LayoutInterface $layout,
        \Mageplaza\HelloWorld\Model\DailydealFactory $hospitalFactory
    ) {
        $this->layout = $layout;
        $this->hospitalFactory=$hospitalFactory;
    }

    public function aroundGetProductDetailsHtml(
        \Magento\Catalog\Block\Product\ListProduct $subject,
        \Closure $proceed,
        \Magento\Catalog\Model\Product $product
    ) {
        $id_daily_deal=$product->getIdDailyDeal();

        $temp= $this->hospitalFactory->create();
        $collection =$temp->getCollection();
        if($product->getIdDailyDeal()){
            $daily_deal_infor  = $collection->addFilter('id_daily_deal',$id_daily_deal);
//            $daily_deal_title =$daily_deal_infor->getFirstItem()['daily_deal_title'];
        return $this->layout->createBlock('Mageplaza\HelloWorld\Block\TimeCountDown')->setIdDailyDeal($product->getIdDailyDeal())->setQuantityDailyDeal($product->getQuantityDailyDeal())->setTemplate('Mageplaza_HelloWorld::timecountdown.phtml')->toHtml();}
    }
}