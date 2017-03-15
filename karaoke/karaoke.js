var $elements = $('#picOne, #picTwo, #picTree,');

function anim_loop(index) {
    $elements.eq(index).fadeIn(1000, function() {
        var $self = $(this);
        setTimeout(function() {
            $self.fadeOut(1000);
            anim_loop((index + 1) % $elements.length);
        }, 1000);
    });
}

anim_loop(0); // start with the first elementment