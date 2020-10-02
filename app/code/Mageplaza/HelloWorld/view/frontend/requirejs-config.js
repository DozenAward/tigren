var config = {

    // "map": {
    //     "*": {
            
    //         "menu": "js/navigation-menu",
    //         "mage/backend/menu": "js/navigation-menu"
    //     }
    //   },
    paths: {
        
        slick: 'js/slick.min',
        test: 'js/test',
        thuong: 'js/thuong'
        // another_alias: 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'
    },
    shim: {
        slick: {
            deps: ['jquery']
        },
        
        test: {
            deps: ['jquery']
        },
        thuong: {
            deps: ['jquery']
        }
        // another_alias: {
        //     deps: ['jquery']
        // }
    }
};