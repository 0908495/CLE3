var $elements = $('#picOne, #picTwo, #picThree, #picFour, #picFive, #picSix');

function anim_loop(index) {
    $elements.eq(index).fadeIn(2000, function() {
        var $self = $(this);
        setTimeout(function() {
            $self.fadeOut(6000);
            anim_loop((index + 1) % $elements.length);
        }, 1500);
    });
}

anim_loop(0);