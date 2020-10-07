<?php
namespace Mageplaza\HelloWorld\Block;
class SizeGuide	extends	\Magento\Cms\Block\Block	implements	\Magento\Framework\DataObject\IdentityInterface
{
    protected $product;
    protected $coreRegistry;
    protected $blockFactory;


    public function __construct(
        \Magento\Framework\View\Element\Context $context,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Cms\Model\BlockFactory $blockFactory,
        \Magento\Framework\Registry $coreRegistry,
        array $data = []
    )
    {
        $this->coreRegistry = $coreRegistry;
        $this->blockFactory = $blockFactory;
        parent::__construct($context, $filterProvider, $storeManager, $blockFactory, $data);
    }

    protected function _toHtml()
    {
        if	($this->getProduct()->getTypeId()	==	\Magento\ConfigurableProduct\Model\Product\Type\Configurable::TYPE_CODE){
                $configurableAttributes	=	$this->getProduct()->getTypeInstance()->getConfigurableAttributesAsArray($this->getProduct())	;
                foreach	($configurableAttributes	as	$attribute)	{
                if	(isset($attribute['attribute_code'])	&&	$attribute['attribute_code']	==	'size') {
                    //            echo "Thưởng hả";
//                   return parent::_toHtml();
                    return $attribute['frontend_label'];
//                    return $this->blockFactory['content'];
                }
            }
		}
        return	'';
}

    public function getProduct()
    {
        if (!$this->product) {
            $this->product = $this->coreRegistry->registry('product');
        }
        return $this->product;
    }
}