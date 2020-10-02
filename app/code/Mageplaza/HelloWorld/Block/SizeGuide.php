<?php
namespace	Mageplaza\HelloWorld\Block;
class	SizeGuide	extends	\Magento\Cms\Block\Block	implements	\Magento\Framework\DataObject\IdentityInte
{
    protected $product;
    protected $coreRegistry;

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
        parent::__construct($context, $filterProvider, $storeManager, $blockFactory, $data);
    }

    public function _toHtml()
    {
        if	($this->getProduct()->getTypeId()	==	\Magento\ConfigurableProduct\Model\Product\Type\Configurable){
        $configurableAttributes	=	$this->getProduct()->getTypeInstance()->getConfigurableAttributesAsArray	;
        foreach	($configurableAttributes	as	$attribute)	{
            if	(isset($attribute['attribute_code'])	&&	$attribute['attribute_code']	==	'size')	{
                return	parent::_toHtml();
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