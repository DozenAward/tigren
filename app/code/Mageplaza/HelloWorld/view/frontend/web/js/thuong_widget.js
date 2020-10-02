define([
    'jquery',
    'jquery-ui-modules/widget', // use individual jQuery UI component if your widget is for frontend or base areas
     // 'jquery/ui', // use all 'jquery/ui' library if your widget is for adminhtml area
    'mage/<widget.name>' // usually widget can be found in /lib/web/mage dir
  ], function($){
  
    $.widget('Magenplaza_HelloWorld.thuong_widget', $.mage.widget.name, {});
  
    return $.Magenplaza_HelloWorld.thuong_widget;
  });