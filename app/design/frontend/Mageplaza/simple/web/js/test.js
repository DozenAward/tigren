function  click_function(){
    alert("Click");
}

$('.hide_content').click(function () {
    $('#contentUpdated').fadeToggle("slow");
    
    });