/* jquery-Snowfall v1.0 | h4wldev@gmail.com | http://github.com/h4wldev */

(function($) {
	$.snowfall = {
        intervals: [],
        $wrapper: null,
        start: function(options, $wrapper) {
            var options = $.extend({}, {
                size: {
                    min: 10,
                    max: 20
                },
                interval: 700,
                color: '#fff',
                content: '&#10052;',
                disappear: 'linear'
            }, options);
            if ($wrapper == undefined) {
                $('body').append('<div id="snowfall-wrapper" />');
                $wrapper = $('body');
                var $heightBody = $('#get-height').height()+'px';
                $wrapper.css({
                    'height': '100%',
                    'width': '100%',
                    'position': 'relative',
                    'overflow-x': 'hidden'
                });
            }
            var $snowfall = $('<div class="flake" />').css({'position': 'absolute', 'top': '-50px'}).html(options.content);
            $.snowfall.$wrapper = $wrapper;
            $.snowfall.$wrapper.show();
            var number;
            if($wrapper.height() < 1500)
            {
                number =(Math.random() * (10000 - 5000 + 1)) + 5000;
            }else
            {
                number =(Math.random() * (30000 - 20000 + 1)) + 20000;
            }

            $.snowfall.intervals.push(setInterval(function() {
                var wrapperWidth = $wrapper.width(),
                    wrapperHeight = $wrapper.height(),
                    flakeSize = options.size.min + (Math.random() * options.size.max),
                    duration = number, // Thời gian chạy
                    startPosition = (Math.random() * wrapperWidth) - 100;
                    $snowfall.clone().appendTo($wrapper).css({
                    'left': startPosition,
                    'opacity': 0.5 + Math.random(),
                    'font-size': flakeSize,
                    'color': options.color
                }).animate({
                    top: wrapperHeight - 180,
                    left: (startPosition - 100) + (Math.random() * 200),
                    opacity: 0.5
                }, duration, options.disappear, function() {
                    $(this).remove();
                });
            }, options.interval));
        },
        stop: function() {
            $.snowfall.intervals.forEach(function(interval) {
                $.snowfall.$wrapper.hide();
                $.snowfall.$wrapper.children('div').each(function() {
                    $(this).remove();
                });
                clearInterval(interval);
            });
        }
    };
})(jQuery);
