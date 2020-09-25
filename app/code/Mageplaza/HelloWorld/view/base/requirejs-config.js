var config = {
    'config': {
        'mixins': {
            'Magento_Checkout/js/view/shipping': {
                'Mageplaza_HelloWorld/js/view/shipping-payment-mixin': true
            },
            'Magento_Checkout/js/view/payment': {
                'Mageplaza_HelloWorld/js/view/shipping-payment-mixin': true
            }
        }
    }
}