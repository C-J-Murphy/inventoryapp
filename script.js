// Main page navigational page scroll
$(document).ready(function(){
    $('.nav').find('li').click(function(){
        var target = $(this).attr('data-target');
        var scroll_to = $('#'+target).parent().offset().top;
        
        $("html, body").animate(
            { scrollTop: scroll_to },1000
            );
        return false;
    });
})
