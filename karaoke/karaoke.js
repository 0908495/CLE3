$(document).ready(function(){

    $(function(){

        $('.container .slides:gt(0)').hide();
        setInterval(function(){
            $('.container :first-child').fadeOut(10).next('.slides').fadeIn(10)
                .end().appendTo('.container');
        }, 1000);

    });

});