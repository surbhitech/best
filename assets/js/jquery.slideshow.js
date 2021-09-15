/**
 * --------------------------------------------------------------------
 * jQuery.slideshow plugin
 * 
 * Version: v2.0.1
 * Author: @mjolnic
 * Url: http://mjolnic.github.com/jquery.slideshow/
 */

;
(function($, undefined) {
    "use strict";
    var _defaults = {
        "prefix": null,
        "circular": true,
        "effect": {
            "fn": function($index, $container, $direction, $prev, $curr, $next, $onEffect) {
                var $o = $container.data("slideshow");
                $prev.fadeOut($o.effect.speed).removeClass("active");
                $curr.fadeIn($o.effect.speed).addClass("active");

                setTimeout(function() {
                    $onEffect();
                }, $o.effect.speed + 90);
            },
            "speed": 400
        },
        "playback": {
            "autoplay": false,
            "speed": 12000,
            "reverse": false
        }
    };

    // bindable events: init, destroy, play, pause, resume, stop, rewind, goto

    var _helpers = {
        "init": function(options) {
            var $this = $(this);
            var $o = $this.data("slideshow");

            if (typeof $o !== 'object') {
                $o = $.extend(true, {}, _defaults, options);
                $o.prefix = $o.prefix || this.selector.split(' ').pop()
                        .replace(/[\.\#\:\]\[]/g, ''); // autoprefix based on selector
                $this.addClass($o.prefix + "-slideshow");
                $this.data("slideshow", $o);

                var total_slides = $this.find("." + $o.prefix + "-slide").length;

                if (total_slides === 0) {
                    $this.addClass($o.prefix + "-empty");
                } else {
                    if (total_slides > 1) {
                        $this.find('.' + $o.prefix + '-controls').show();
                    }
                    $this.find('.' + $o.prefix + '-slide:first').addClass("active").show();
                }

                var _resumeOnceOnEffect = function() {
                    var _fn = function() {
                        $this.slideshow("resume");
                        $this.off("effect.slideshow", null, _fn);
                    };
                    $this.bind("effect.slideshow", _fn)
                };

                $this.find("." + $o.prefix + "-next").click(function() {
                    $this.slideshow("pause");
                    _resumeOnceOnEffect("next resuming");
                    $this.slideshow("next");
                });

                $this.find("." + $o.prefix + "-prev").click(function() {
                    $this.slideshow("pause");
                    _resumeOnceOnEffect("prev resuming");
                    $this.slideshow("prev");
                });

                $this.find("." + $o.prefix + "-play").click(function() {
                    $this.slideshow("play");
                });

                $this.find("." + $o.prefix + "-pause").click(function() {
                    $this.slideshow("pause");
                });

                $this.find("." + $o.prefix + "-stop").click(function() {
                    $this.slideshow("stop");
                });

                $this.slideshow("goto", 0);

                if ($o.playback.autoplay) {
                    $this.slideshow("play");
                }

                $(function() {
                    $this.trigger("init.slideshow");
                });
            }

            return this;
        },
        "destroy": function() {
            var $this = $(this);
            var $o = $this.data("slideshow");
            $this.slideshow("stop").slideshow("goto", 0)
                    .removeClass($o.prefix + "-slideshow")
                    .find("." + $o.prefix + "-prev, ." + $o.prefix + "-next, ." +
                    $o.prefix + "-play, ." + $o.prefix + "-pause, ." +
                    $o.prefix + "-stop").off('click');
            $this.removeData("slideshow");
            $this.trigger("destroy.slideshow");
            return $this;
        },
        "play": function() {
            var $this = $(this);
            var $o = $this.data("slideshow");
            var $i = $this.data('slideshow_interval');

            if ($i) {
                clearInterval($i);
            }

            $this.addClass($o.prefix + "-playing").removeClass($o.prefix + "-paused");
            $i = setInterval(function() {
                if ($o.playback.reverse === true) {
                    $this.slideshow("prev");
                } else {
                    $this.slideshow("next");
                }
            }, $o.playback.speed);
            $this.data('slideshow_interval', $i);
            $this.trigger("play.slideshow", [$i]);
            return $this;
        },
        "resume": function() { //play only if it is paused
            var $this = $(this);
            var $o = $this.data("slideshow");
            if ($this.hasClass($o.prefix + "-paused")) {
                $this.slideshow("play");
            }
            $this.trigger("resume.slideshow");
            return $this;
        },
        "pause": function() {
            var $this = $(this);
            var $o = $this.data("slideshow");

            if ($this.hasClass($o.prefix + "-playing")) {
                var $i = $this.data('slideshow_interval');

                if ($i) {
                    clearInterval($i);
                    $this.removeData('slideshow_interval');
                }
                $this.removeClass($o.prefix + "-playing").addClass($o.prefix + "-paused");
                $this.trigger("pause.slideshow");
            }
            return $this;
        },
        "stop": function() {
            var $this = $(this);
            var $o = $this.data("slideshow");
            $this.slideshow("pause");
            $this.removeClass($o.prefix + "-playing").removeClass($o.prefix + "-paused");
            $this.trigger("stop.slideshow");
            return $this;
        },
        "rewind": function() {
            var $this = $(this);
            $this.slideshow("goto", 0);
            $this.trigger("rewind.slideshow");
            return $this;
        },
        "goto": function(index) {
            var $this = $(this);
            var $o = $this.data("slideshow");
            var direction = null;

            var $item = $this.find("." + $o.prefix + "-slide:eq(" + index + ")");

            if ($item.size() > 0) {
                if (!$item.hasClass("active")) {
                    var $prev = $this.find("." + $o.prefix + "-slide.active");

                    if (index > $prev.index()) {
                        direction = "next";
                    } else if (index < $prev.index()) {
                        direction = "prev";
                    }

                    var $next = $item.next("." + $o.prefix + "-slide");
                    if ($next.length === 0) {
                        $next = $this.find("." + $o.prefix + "-slide:eq(0)");
                    }
                    var $o = $this.data("slideshow");

                    $this.trigger("goto.slideshow", [index, $this, direction, $prev, $item, $next]);

                    var onEffect = function() {
                        $this.trigger("effect.slideshow", [$o.effect, index, $this, direction, $prev, $item, $next, arguments]);
                    };

                    if (typeof($o.effect.fn) === 'function') {
                        $o.effect.fn(index, $this, direction, $prev, $item, $next, onEffect);
                    }
                    return $this;
                }
            }

            $this.trigger("goto.slideshow", [index, $this, null, null, $item, null]);
            return $this;
        },
        "next": function() {
            var $this = $(this);
            var $o = $this.data("slideshow");

            var eq = $this.find("." + $o.prefix + "-slide.active").index() + 1;

            if (eq >= $this.find("." + $o.prefix + "-slide").size()) {
                if ($o.circular === true) {
                    eq = 0;
                } else {
                    return $this;
                }
            }
            $this.slideshow("goto", eq);
            return $this;
        },
        "prev": function() {
            var $this = $(this);
            var $o = $this.data("slideshow");

            var eq = $this.find("." + $o.prefix + "-slide.active").index() - 1;

            if (eq < 0) {
                if ($o.circular === true) {
                    eq = $this.find("." + $o.prefix + "-slide").size() - 1;
                } else {
                    return $this;
                    ;
                }
            }

            $this.slideshow("goto", eq);
            return $this;
        }
    };

    $.fn.slideshow = $.fn.slideshow = function(param) {
        // Method calling logic
        if (typeof param === 'object' || !param) {
            return _helpers.init.apply(this, arguments);
        } else if (_helpers[param]) {
            return _helpers[param].apply(this, Array.prototype.slice.call(arguments, 1));
        } else {
            $.error('Method ' + param + ' does not exist on jQuery.slideshow');
            return false;
        }
    };
})(jQuery);