var $elements = $('#picOne, #picTwo, #picThree, #picFour, #picFive, #picSix, #picSeven, #picEight, #picNine, #picTen');

function anim_loop(index) {
    $elements.eq(index).fadeIn(2000, function() {
        var $self = $(this);
        setTimeout(function() {
            $self.fadeOut(2000);
            anim_loop((index + 1) % $elements.length);
        }, 100);
    });
}

anim_loop(0);