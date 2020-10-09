<?php

namespace Mageplaza\HelloWorld\Plugin;
    class NewProductFlag
    {
    protected	$request;
    protected	$localeDate;
    public	function	__construct(
    \Magento\Framework\App\RequestInterface	$request,
    \Magento\Framework\Stdlib\DateTime\TimezoneInterface	$localeDate
    )
    {
    $this->request	=	$request;
    $this->localeDate	=	$localeDate;
    }
    public function afterGetName(\Magento\Catalog\Api\Data\ProductInterface	$subject,	$result)
    {
    $pages	=	['catalog_product_view',	'catalog_category_view'];
    if	(in_array($this->request->getFullActionName(),	$pages))	{
//    $timezone	=	new	\DateTimeZone($this->localeDate->getConfigTimezone());
//    $now	=	new	\DateTime('now',	$timezone);
    $new_item	=		$subject->getIsNewItem();
//    echo $new_item;
    if	($new_item==1)	{
    return	__( '[NEW]	')	.	$result;
    } else{
        return	__('[OLD]	')	.	$result;
    }
}
return	$result;
}


function getNew_data(){

}
}